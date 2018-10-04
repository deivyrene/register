<?php

namespace Siac\Http\Controllers;
use Siac\Place;
use Siac\Visitor;
use Siac\PlaceVisitor;
use Siac\User;
use Siac\Http\Requests\VisitorRequest;
use Carbon\Carbon;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisitorController extends Controller
{   
    public function index(Request $request){

        $request->user()->authorizeRoles(['user','admin']);
        
        return view('visitors.index');
    }

    public function visitorList(Request $request){
        
        $request->user()->authorizeRoles(['user','admin']);

        return view('visitors.visitors');
    }

    public function getVisitors(Request $request)
    {  
        $role = $request->user()->typeRole();

        if($role == "admin"){
            
            $visitor = \DB::table('visitors')->join('place_visitors', 'place_visitors.visitor_id', '=', 'visitors.id' )
                                             ->join('places', 'places.id', '=', 'place_visitors.place_id')
                                             ->select('visitors.*', 'place_visitors.comments', 'places.edifice_id')
                                             ->groupBy('visitors.emailVisitor');

        }else{

            $edifice_id = $request->user()->hasEdifice();

            $visitor = \DB::table('visitors')->join('place_visitors', 'place_visitors.visitor_id', '=', 'visitors.id' )
                                             ->join('places', 'places.id', '=', 'place_visitors.place_id')
                                             ->select('visitors.*', 'place_visitors.comments', 'places.edifice_id')
                                             ->groupBy('visitors.emailVisitor')
                                             ->where('edifice_id', $edifice_id);
                                           
        } 

         return Datatables::of($visitor)->addColumn('action', function ($user) {
             return '<a href="http://localhost:8000/visitors/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>';
         })->make(true);
    }
 
    public function getVisitor(Request $request)
    {  
        $role = $request->user()->typeRole();

        if($role == "admin"){
            
            $visitor = \DB::table('places')->join('place_visitors', 'places.id', '=', 'place_visitors.place_id' )
                                           ->join('visitors', 'place_visitors.visitor_id', '=', 'visitors.id');
        }else{
            $edifice_id = $request->user()->hasEdifice();

            if($request->flag == "dateRange"){

                $visitor = \DB::table('places')->join('place_visitors', 'places.id', '=', 'place_visitors.place_id' )
                                 ->join('visitors', 'place_visitors.visitor_id', '=', 'visitors.id')
                                 ->where('edifice_id', $edifice_id)->whereBetween('arrivalTime', [$request->dateIn, $request->dateOf]);
                

            }else{
                
            $visitor = \DB::table('places')->join('place_visitors', 'places.id', '=', 'place_visitors.place_id' )
                                 ->join('visitors', 'place_visitors.visitor_id', '=', 'visitors.id')
                                 ->where('edifice_id', $edifice_id)->whereDate('arrivalTime', Carbon::now()->format('Y-m-d'));

            }

            
        } 

         return Datatables::of($visitor)->addColumn('action', function ($user) {
             return '<a href="#" title="Marcar salida" onclick="outVisitor('.$user->id.')" class="btn btn-sm btn-success"><i class="far fa-clock"></i>';
         })->make(true);
    }
 
     public function create()
     {
        $role = $request->user()->typeRole();
        if($role == "admin"){
            $places = Place::all();
        }
        else{
            $edifice_id = $request->user()->hasEdifice();
            $places = Place::where('edifice_id','=',$edifice_id)->get();
        }
        

        return view('visitors.search', compact('places'));
     }

     public function edit($id)
     {
         $visitor = Visitor::find($id);
 
         return view('visitors.edit', compact('visitor'));
 
     }
     public function update(VisitorRequest $request, $id)
     {
         $visitor = Visitor::find($id);
 
         $visitor->nameVisitor     = $request->nameVisitor;
         $visitor->surnameVisitor = $request->surnameVisitor;
         $visitor->rutVisitor = $request->rutVisitor;
         $visitor->emailVisitor = $request->emailVisitor;
         $visitor->phoneVisitor = $request->phoneVisitor;
         $visitor->addressVisitor = $request->addressVisitor;
         $visitor->companyVisitor = $request->companyVisitor;

         $visitor->save();
 
         return redirect('visitorsList')->with('info','El visitante ha sido editado');
     }
     
     public function show($id)
     {
         $visitor = Visitor::find($id);
 
         return view('visitors.show', compact('visitor'));
     }

    //Obtener un visitante si esta registrado, sino esta envia resultado null
    public function getSearchVisitor(request $request){

        if($request->ajax()){

            $visitor = Visitor::where('rutVisitor','=',$request->rutVisitor)->get();

            return response()->json($visitor);
        }
    }

    //guardar visitante y ademas lugar de visita
    public function storeVisitorPlace(request $request){
        
        if($request->ajax()){

            if($request->flag == 1){
                
                $visitor = new PlaceVisitor;
 
                $visitor->comments     = $request->comments;
                $visitor->arrivalTime = \Carbon\Carbon::now();
                $visitor->departureTime = "";
                $visitor->visitor_id = $request->visitor_id;
                $visitor->place_id = $request->place_id;
       
                $visitor->save();

                return redirect()->route('visitors.index')->with('info','Se ha registrado el visitante');

            } 
            else{
                
                $visitor = new Visitor;
 
                $visitor->nameVisitor     = $request->nameVisitor;
                $visitor->surnameVisitor = $request->surnameVisitor;
                $visitor->rutVisitor = $request->rutVisitor;
                $visitor->emailVisitor = $request->emailVisitor;
                $visitor->phoneVisitor = $request->phoneVisitor;
                $visitor->addressVisitor = $request->addressVisitor;
                $visitor->companyVisitor = $request->companyVisitor;

                $visitor->save();
        
                $visitorPlace = new PlaceVisitor;
 
                $visitorPlace->comments = $request->comments;
                $visitorPlace->arrivalTime = \Carbon\Carbon::now();
                $visitorPlace->departureTime = "";
                $visitorPlace->visitor_id = $visitor->id;
                $visitorPlace->place_id = $request->place_id;

                $visitorPlace->save();

                return redirect()->route('visitors.index')->with('info','Se ha registrado el visitante');
            }

           // return response()->json($visitor);
        }
    }

    //Actualizar fecha de salida visitante
    public function outVisitor(request $request)
     {
         if($request->ajax()){
 
             $visitor = PlaceVisitor::find($request->id);
             $visitor->departureTime = \Carbon\Carbon::now();
             $visitor->save();
             
             return "Se ha actualizado correctamente";
         }
     }
}
