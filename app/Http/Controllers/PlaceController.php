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
        
        $request->user()->authorizeRoles(['user','admin']);
        
        return view('places.index');
    }

    public function getPlace(Request $request)
    {
        $role = $request->user()->typeRole();

        if($role == "admin"){
                $places = Place::with(['edifices' => function($query){
                    $query->select('id','nameEdifice');
                }])->orderBy('id', 'asc');
        }
        else{
        
                $edifice_id = $request->user()->hasEdifice();

                $places = Place::with(['edifices' => function($query) {
                    $query->select('id','nameEdifice');
                }])->where('edifice_id', $edifice_id)->orderBy('id', 'asc');
        }

        return Datatables::of($places)->addColumn('action', function ($user) {
            return '<a href="http://localhost:8000/places/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                    <a href="#" onclick="destroyPlace('.$user->id.')" class="btn btn-sm btn-warning"><i class="material-icons">delete_forever</i></a>';
        })->make(true);
    }

    public function create(Request $request){

        $role = $request->user()->typeRole();
        if($role == "admin"){
            $edifice_id = "";
        }
        else{
            $edifice_id = $request->user()->hasEdifice();
        }

        if(isset($edifice_id)){
            $edifices = Edifice::all();
        }
        else{
            $edifices = Edifice::all(['id', 'nameEdifice'])->where('id', $edifice_id)->first();
        }
        
        return view('places.create', compact('edifices'));
    }

    public function store(PlaceRequest $request){

        $place = new Place;

        $place->numberPlace = $request->numberPlace;
        $place->namePlace = $request->namePlace;
        $place->phonePlace = $request->phonePlace;
        $place->ownerPlace = $request->ownerPlace;
        $place->mailPlace = $request->mailPlace;
        $place->edifice_id = $request->edifice_id;

        $place->save();

        return redirect()->route('places.index')->with('info','Se ha registrado con éxito');

    }

    public function edit($id){
       
        $place = Place::find($id);
        $edifices = Edifice::all(['id', 'nameEdifice']);
        return view('places.edit', compact('place','edifices'));
       
    }

    public function update(PlaceRequest $request, $id){

        $place = Place::find($id);

        $place->numberPlace = $request->numberPlace;
        $place->namePlace = $request->namePlace;
        $place->phonePlace = $request->phonePlace;
        $place->ownerPlace = $request->ownerPlace;
        $place->mailPlace = $request->mailPlace;
        $place->edifice_id = $request->edifice_id;

        $place->save();

        return redirect()->route('places.index')->with('info','Se ha editado exitosamente');

    }


    public function destroyPlace(request $request){

        if($request->ajax())
        {
            $place = Place::find($request->id);

            $place->delete();

            return 'Se ha eliminado satisfactoriamente';
        }
        
    }

    public function importPlace(Request $request)
    {

        $role = $request->user()->typeRole();

        if($role == "admin"){
            
            Excel::load($request->excel, function($reader) {

                $excel = $reader->get();
                // iteracción
                $excel->each(function($row){
    
                    $place = new Place();
                    $place->numberPlace = $row['numberplace'];
                    $place->namePlace = $row['nameplace'];
                    $place->phonePlace = $row['phoneplace'];
                    $place->ownerPlace = $row['ownerplace'];
                    $place->mailPlace = $row['mailplace'];
                    $place->edifice_id = $row['edifice_id'];
                    $place->save();
                });
            
            });
        }
        else{
        
            $edifice_id = $request->user()->hasEdifice();

            Excel::load($request->excel, function($reader) {

                $excel = $reader->get();
                // iteracción
                $excel->each(function($row){
    
                    $place = new Place();
                    $place->numberPlace = $row['numberplace'];
                    $place->namePlace = $row['nameplace'];
                    $place->phonePlace = $row['phoneplace'];
                    $place->ownerPlace = $row['ownerplace'];
                    $place->mailPlace = $row['mailplace'];
                    $place->edifice_id = $edifice_id;
                    $place->save();
                });
            
            });

                
        }

        return redirect()->route('places.index')->with('info','Se ha importado exitosamente');
    }

    public function getImport(){

        return view('places.show');
    }

}
