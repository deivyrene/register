<?php

namespace Siac\Http\Controllers;

use Illuminate\Http\Request;
use Siac\Edifice;
use Siac\User;
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
        $edifices = Edifice::where('statusEdifice', '1')->orderBy('id','DESC');
 
        return Datatables::of($edifices)->addColumn('action', function ($user) {
            return '<a href="http://localhost:8000/edifices/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                    ';
        })->make(true);
    }

    public function create(){

        $edit = "none";
        return view('edifices.create', compact('edit'));
    }

    public function store(EdificeRequest $request){

        if($request->password === $request->password_confirmation)
        {

            $edifice = new Edifice;

            $edifice->nameEdifice = $request->nameEdifice;
            $edifice->contactEdifice = $request->contactEdifice;
            $edifice->addressEdifice = $request->addressEdifice;
            $edifice->emailEdifice = $request->emailEdifice;
            $edifice->statusEdifice = 1;
            $edifice->save();

            $user = new User;

            $user->name = $request->contactEdifice;
            $user->email = $request->emailEdifice;
            $user->password = bcrypt($request->password);
            $user->edifice_id = $edifice->id;
            $user->role_id = 2;
           
            $user->save();

            return redirect()->route('edifices.index')->with('info', 'La empresa se ha registrado');
            
        }else{
           
            return redirect()->route('edifices.index')->with('info', 'Verifique nuevamente la contraseña');
        }
    }

    public function edit($id){

        $edifices = Edifice::find($id);
        $edit = "true";

        return view('edifices.edit', compact('edifices', 'edit'));

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
            $edifice->statusEdifice = 0;
            $edifice->save();

            return 'El edificio ha sido eliminado';
        }
    }

    public function show($id){

        $edifices = Edifice::find($id);

        return view('edifices.show', compact('edifices'));
    }
}
