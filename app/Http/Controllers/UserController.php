<?php

namespace Siac\Http\Controllers;

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
        $request->user()->authorizeRoles(['admin']);

        return view('users.index', compact('users'));
    }

    public function getUserSystem()
    {
        
        $users = User::OrderBy('created_at', 'desc');
 
        return Datatables::of($users)->addColumn('action', function ($user) {
            return '<a href="http://localhost:8000/users/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                    <a href="#" onclick="destroyUserSystem('.$user->id.')" class="btn btn-sm btn-warning"><i class="material-icons">delete_forever</i></a>';
        })->make(true);
    }
   
    public function create()
    {
        $role = Role::all(['id', 'nameRole']);
        $edifice = Edifice::all(['id', 'nameEdifice']);

        return view('users.create', compact('role', 'edifice'));
    }

    
    public function store(Request $request)
    {   
        $role = Role::find($request->role_id);
        $edifice = Edifice::find($request->edifice_id);

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $user->roles()->attach($role);
        $user->edifices()->attach($edifice);

        return redirect()->route('users.index')->with('info', 'El usuario se ha registrado');
    }
    
    public function edit($id)
    {
        $role = Role::all(['id', 'nameRole']);
        $edifice = Edifice::all(['id', 'nameEdifice']);
        $user = User::find($id);

        return view('users.edit', compact('user', 'role', 'edifice'));
    }

    
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->name     = $request->name;
        $users->email    = $request->email;
        $users->password = bcrypt($request->password);

        $users->save();

        return redirect()->route('users.index')->with('info','El usuario ha sido editado');
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
