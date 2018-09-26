<?php

namespace Siac\Http\Controllers;

use Illuminate\Http\Request;
use Siac\Edifice;
use Siac\Http\Requests\EdificeRequest;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;

class EdificeController extends Controller
{
    public function index(Request $request){

        $request->user()->authorizeRoles(['admin']);

        return view('edifices.index', compact('edifices'));
    }

    public function getEdifice()
    {
        $edifices = Edifice::orderBy('id','DESC');
 
        return Datatables::of($edifices)->addColumn('action', function ($user) {
            return '<a href="http://localhost:8000/edifices/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                    <a href="#" onclick="destroyEdifice('.$user->id.')" class="btn btn-sm btn-warning"><i class="material-icons">delete_forever</i></a>';
        })->make(true);
    }

    public function create(){

        return view('edifices.create');
    }

    public function store(EdificeRequest $request){

        $edifice = new Edifice;

        $edifice->nameEdifice = $request->nameEdifice;
        $edifice->contactEdifice = $request->contactEdifice;
        $edifice->addressEdifice = $request->addressEdifice;
        $edifice->emailEdifice = $request->emailEdifice;

        $edifice->save();

        return redirect()->route('edifices.index')->with('info', 'La empresa se ha registrado');
    }

    public function edit($id){

        $edifices = Edifice::find($id);

        return view('edifices.edit', compact('edifices'));

    }

    public function update(EdificeRequest $request, $id){

        $edifice = Edifice::find($id);

        $edifice->nameEdifice = $request->nameEdifice;
        $edifice->addressEdifice = $request->addressEdifice;
        $edifice->contactEdifice = $request->contactEdifice;
        $edifice->emailEdifice = $request->emailEdifice;

        $edifice->save();

        return redirect()->route('edifices.index')->with('info', 'El edificio se ha editado');
    }

    public function destroyEdifice(request $request){

        if($request->ajax()){

            $edifice = Edifice::find($request->id);
            $edifice->delete();

            return 'El edificio ha sido eliminado';
        }
    }

    public function show($id){

        $edifices = Edifice::find($id);

        return view('edifices.show', compact('edifices'));
    }
}
