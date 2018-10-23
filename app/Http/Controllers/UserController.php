<?php

namespace Siac\Http\Controllers;

use Siac\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Siac\Http\Requests;
use Siac\Http\Controllers\Controller;
use Siac\User;
use Siac\Role;
use Siac\Edifice;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        //$users = User::OrderBy('created_at', 'desc')->paginate(5);
        $request->user()->authorizeRoles(['admin', 'adminEdifice']);

        return view('users.index', compact('users'));
    }

    public function getUserSystem(Request $request)
    {
        $tipo = $request->user()->typeRole();

        if($tipo === "admin"){
            $users = User::with(['roles'])->where('role_id', 1)->orwhere('role_id', 2)->OrderBy('created_at', 'desc');
        }
        if($tipo === "adminEdifice"){
            $edifice_id = $request->user()->hasEdifice();
            $users = User::with(['roles'])->where('edifice_id', $edifice_id)->where('role_id', 3)->orwhere('role_id', 4)->OrderBy('created_at', 'desc');
        }

        return Datatables::of($users)->addColumn('action', function ($user) {
            return '<a href="http://localhost:8000/users/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                    ';
        })->make(true);
    }
   
    public function create(Request $request)
    {
        $tipo = $request->user()->typeRole();

        if($tipo === "admin"){
            $role = Role::where('nameRole', 'admin')->orWhere('nameRole', 'adminEdifice')->get();
            $edifice = Edifice::all(['id', 'nameEdifice']);
        }
        if($tipo === "adminEdifice"){
            $edifice_id = $request->user()->hasEdifice();
            $edifice = Edifice::where('id', $edifice_id);
            $role = Role::where('nameRole', 'user')->get();
        }
        
        return view('users.create', compact('role', 'edifice'));
    }

    
    public function store(UserRequest $request)
    {   

        $tipo = $request->user()->typeRole();

        if($tipo === "admin"){
            $role    = $request->role_id;
            $edifice = $request->edifice_id;

            $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
            
            //Creando usuario adminMaster
            if($role === "1"){
                $user = new User;
                $user->name     = $request->name;
                $user->email    = $request->email;
                $user->password = bcrypt($request->password);
                $user->role_id  = $request->role_id;
                $user->save();
            }
            //Creando usuario adminEdifice
            if($role === "2"){
                $user = new User;
                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->password    = bcrypt($request->password);
                $user->edifice_id  = $request->edifice_id;
                $user->role_id     = $request->role_id;
                $user->save();
            }
            
        }

        if($tipo === "adminEdifice"){
            $edifice_id = $request->user()->hasEdifice();

            $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = new User;
            $user->name        = $request->name;
            $user->email       = $request->email;
            $user->password    = bcrypt($request->password);
            $user->edifice_id  = $edifice_id;
            $user->role_id     = $request->role_id;
            $user->save();
        }
        
        return redirect()->route('users.index')->with('info', 'El usuario se ha registrado');
    }
    
    public function edit(Request $request, $id)
    {
        $tipo = $request->user()->typeRole();

        if($tipo === "admin"){

            $user = User::where('id', $id)->get();
                
            $userEdifice = $user[0]->edifice_id;
            $userRole    = $user[0]->role_id;
            $role = Role::where('nameRole', 'admin')->orWhere('nameRole', 'adminEdifice')->get();
            $edifice = Edifice::all(['id', 'nameEdifice']);

        }

        if($tipo == "adminEdifice"){
            
            $user = User::where('id', $id)->get();
                
            $userEdifice = $user[0]->edifice_id;
            $userRole    = $user[0]->role_id;

            $edifice_id = $request->user()->hasEdifice();
            $edifice = Edifice::where('id', $edifice_id)->get();
            $role = Role::where('nameRole', 'user')->orwhere('nameRole', 'owner')->get();

        }   
        
        return view('users.edit', compact('user', 'role', 'edifice', 'userRole', 'userEdifice'));
    }

    
    public function update(Request $request, $id)
    {
        $tipo = $request->user()->typeRole();

        if($request->password != ""){

            if($tipo === "admin"){

                $role = $request->role_id;
                $edifice = $request->edifice_id;
                if($role === "1"){

                    $users = User::find($id);

                    $users->name       = $request->name;
                    $users->email      = $request->email;
                    $users->password   = bcrypt($request->password);
                    
                    $users->save();
                }
                if($role === "2"){

                    $users = User::find($id);

                    $users->name       = $request->name;
                    $users->email      = $request->email;
                    $users->password   = bcrypt($request->password);

                    $users->save();
                }
            }

            if($tipo === "adminEdifice"){
                
                    $edifice_id = $request->user()->hasEdifice();

                    $users = User::find($id);

                    $users->name       = $request->name;
                    $users->email      = $request->email;
                    $users->password   = bcrypt($request->password);

                    $users->save();
            }

            return redirect()->route('users.index')->with('info','El usuario ha sido editado');

        }else{
            return redirect()->route('users.index')->with('info','Verifique contraseña');
        }

        
    }

    
    public function destroyUserSystem(request $request)
    {
        if($request->ajax())
        {
            $user = User::find($request->id);
            $user->delete();

            return 'Se ha eliminado el usuario de sistema';
        }
    }
}
