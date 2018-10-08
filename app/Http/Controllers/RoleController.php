<?php

namespace Siac\Http\Controllers;
use Siac\Role;
use Siac\Http\Requests\RoleRequest;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;

class RoleController extends Controller
{
    public function index(Request $request){

        $request->user()->authorizeRoles(['admin']);

        return view('roles.index');
     }
 
     public function getRole()
     {
         $roles = Role::orderBy('id','DESC');
  
         return Datatables::of($roles)->addColumn('action', function ($user) {
             return '<a href="http://localhost:8000/roles/'.$user->id.'/edit" class="btn btn-sm btn-info"><i class="material-icons">border_color</i></a>
                     ';
         })->make(true);
     }
 
     public function create()
     {
         return view('roles.create');
     }
     public function store(RoleRequest $request)
     {
         $role = new Role;
 
         $role->nameRole     = $request->nameRole;
         $role->descriptionRole = $request->descriptionRole;
 
         $role->save();
 
         return redirect()->route('roles.index')->with('info','El rol se ha registrado');
     }
     public function edit($id)
     {
         $role = Role::find($id);
 
         return view('roles.edit', compact('role'));
 
     }
     public function update(RoleRequest $request, $id)
     {
         $role = Role::find($id);
 
         $role->nameRole     = $request->nameRole;
         $role->descriptionRole = $request->descriptionRole;
 
         $role->save();
 
         return redirect()->route('roles.index')->with('info','El rol ha sido editado');
     }
     public function destroyRole(request $request)
     {
         if($request->ajax()){
 
             $role = Role::find($request->id);
             $role->delete();
 
             return "El rol ha sido eliminado";
         }
     }
     public function show($id)
     {
         $role = Role::find($id);
 
         return view('roles.show', compact('role'));
     }
}
