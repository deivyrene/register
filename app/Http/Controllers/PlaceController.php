<?php

namespace Siac\Http\Controllers;

use Illuminate\Http\Request;
use Siac\Place;
use Siac\Edifice;
use Siac\User;
use Siac\Http\Requests\PlaceRequest;
use \Excel;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;

class PlaceController extends Controller
{
    public function index(Request $request){
        
        $request->user()->authorizeRoles(['admin', 'adminEdifice']);
        
        return view('places.index');
    }

    public function getPlace(Request $request)
    {
        $role = $request->user()->typeRole();

        if($role === "admin"){

                $places = Place::with(['edifices' => function($query){
                    $query->select('id','nameEdifice');
                }])->orderBy('id', 'asc');

            return Datatables::of($places)->addColumn('action', function ($user) {
                return '<a href="http://localhost:8000/places/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>';
            })->make(true);

        }
        if($role === "adminEdifice"){
        
                $edifice_id = $request->user()->hasEdifice();

                $places = Place::with(['edifices' => function($query) {
                    $query->select('id','nameEdifice');
                }])->where('edifice_id', $edifice_id)->orderBy('id', 'asc');

                return Datatables::of($places)->addColumn('action', function ($user) {
                    return '<a href="http://localhost:8000/places/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>';
                })->make(true);

        }
        if($role === "user"){
            
                $edifice_id = $request->user()->hasEdifice();

                $places = Place::with(['edifices' => function($query) {
                    $query->select('id','nameEdifice');
                }])->where('edifice_id', $edifice_id)->orderBy('id', 'asc');

                return Datatables::of($places)->addColumn('action', function ($user) { })->make(true);
        }
        if($role === "owner"){
            
            $edifice_id = $request->user()->hasEdifice();

            $places = Place::with(['edifices' => function($query) {
                $query->select('id','nameEdifice');
            }])->where('edifice_id', $edifice_id)->orderBy('id', 'asc');

            return Datatables::of($places)->addColumn('action', function ($user) { })->make(true);
        }


    }

    public function create(Request $request){

        $role = $request->user()->typeRole();
        
        if($role === "admin"){
            $preEdifice = "false";
            $edifices = Edifice::where('statusEdifice', '1')->get();
        }
        if($role === "adminEdifice"){
            $preEdifice = "true";
            $edifice_id = $request->user()->hasEdifice();
            $edifices = Edifice::where('id', $edifice_id)->get();
        }
        
        return view('places.create', compact('edifices', 'preEdifice'));
    }

    public function store(PlaceRequest $request){

        $role = $request->user()->typeRole();

        if($role === "admin"){

            try{
                $place = new Place;

                $place->numberPlace = $request->numberPlace;
                $place->namePlace   = $request->namePlace;
                $place->phonePlace  = $request->phonePlace;
                $place->ownerPlace  = $request->ownerPlace;
                $place->mailPlace   = $request->mailPlace;
                $place->edifice_id  = $request->edifice_id;
                $place->statusPlace = 1;
                $place->save();

            }catch(\Illuminate\Database\QueryException $e){

                return redirect()->route('places.index')->with('info','No se registro, Verifique los datos!!');
            }

            try{
                $user = new User;

                $user->name       = $request->ownerPlace;
                $user->email      = $request->mailPlace;
                $user->password   = bcrypt("123456");
                $user->edifice_id = $request->edifice_id;
                $user->place_id   = $place->id;
                $user->role_id    = 4;
                $user->save();

            }catch(\Illuminate\Database\QueryException $e){

                $id = $place->id;
                $place->destroy($id);

                return redirect()->route('places.index')->with('info','No se registro, Verifique los datos!!');
            }
            
        }
        
        if($role === "adminEdifice"){
            
            try{

                $edifice_id = $request->user()->hasEdifice();
                
                $place = new Place;

                $place->numberPlace = $request->numberPlace;
                $place->namePlace   = $request->namePlace;
                $place->phonePlace  = $request->phonePlace;
                $place->ownerPlace  = $request->ownerPlace;
                $place->mailPlace   = $request->mailPlace;
                $place->edifice_id  = $edifice_id;
                $place->statusPlace = 1;

                $place->save();

            }catch(\Illuminate\Database\QueryException $e){

                return redirect()->route('places.index')->with('info','No se registro, Verifique los datos!!');
            }

            try{
                $user = new User;

                $user->name       = $request->ownerPlace;
                $user->email      = $request->mailPlace;
                $user->password   = bcrypt("123456");
                $user->edifice_id = $edifice_id;
                $user->place_id   = $place->id;
                $user->role_id    = 4;
            
                $user->save();
            }catch(\Illuminate\Database\QueryException $e){

                return redirect()->route('places.index')->with('info','No se registro, Verifique los datos!!');
            }
        }
        

        return redirect()->route('places.index')->with('info','Se ha registrado con éxito');

    }

    public function edit(Request $request, $id){
       
        $place = Place::find($id);
        $role = $request->user()->typeRole();
        
        if($role === "admin"){
            $preEdifice = "false";
            $edifices = Edifice::where('statusEdifice', '1')->get();
        }
        if($role === "adminEdifice"){
            $preEdifice = "true";
            $edifice_id = $request->user()->hasEdifice();
            $edifices = Edifice::where('id', $edifice_id)->get();
        }
        return view('places.edit', compact('place','edifices', 'preEdifice'));
       
    }

    public function update(PlaceRequest $request, $id){

        $role = $request->user()->typeRole();

            try{

                $place = Place::find($id);

                $user = User::where('email',$place->mailPlace)
                              ->update(['email' => $request->mailPlace, 
                                        'name'  => $request->ownerPlace]);
                                        
                $place->numberPlace = $request->numberPlace;
                $place->namePlace   = $request->namePlace;
                $place->phonePlace  = $request->phonePlace;
                $place->ownerPlace  = $request->ownerPlace;
                $place->mailPlace   = $request->mailPlace;
                
                $place->save();

                
            }catch (\Illuminate\Database\QueryException $e) {

                return redirect()->route('places.index')->with('info','No se pudo editar, Verifique los datos!!');
            }

        return redirect()->route('places.index')->with('info','Se ha editado exitosamente');

    }


    public function destroyPlace(request $request){

        if($request->ajax())
        {
            $place = Place::find($request->id);
            $place->statusPlace = 0;
            $place->save();

            return 'Se ha eliminado satisfactoriamente';
        }
        
    }

    public function importPlace(Request $request)
    {
        
       $role = $request->user()->typeRole();

        if($role === "admin" || $role === "adminEdifice"){

            Excel::load($request->excel, function($reader) {

                $excel = $reader->get();
                // iteracción
                $excel->each(function($row){

                    try{
                        $place = new Place;
                        $place->numberPlace = $row['numberplace'];
                        $place->namePlace   = $row['nameplace'];
                        $place->phonePlace  = $row['phoneplace'];
                        $place->ownerPlace  = $row['ownerplace'];
                        $place->mailPlace   = $row['mailplace'];
                        $place->edifice_id  = $row['edifice_id'];
                        $place->save();
                    }catch(\Illuminate\Database\QueryException $e){
                        return redirect()->route('places.index')->with('info','Verifique los datos del archivo!!');
                    }
                    
                    try{
                        $user = new User;
                        $user->name       = $row['ownerplace'];
                        $user->email      = $row['mailplace'];
                        $user->password   = bcrypt("123456");
                        $user->edifice_id = $row['edifice_id'];
                        $user->place_id   = $place->id;
                        $user->role_id    = 4;
                        $user->save();
                    }catch(\Illuminate\Database\QueryException $e){

                        $id = $place->id;
                        $place->destroy($id);

                        return redirect()->route('places.index')->with('info','Verifique los datos del archivo!!');
                    }
                    
                });
            
            });

            return redirect()->route('places.index')->with('info','Se ha importado exitosamente');
        }
    }

    public function getImport(){

            return view('places.show');

    }

    public function getPlaceEdifice(Request $request){

        $edifice_id = $request->user()->hasEdifice();
        $places = Place::where('edifice_id','=',$edifice_id)->get();

        return response()->json($places); 
    }

}
