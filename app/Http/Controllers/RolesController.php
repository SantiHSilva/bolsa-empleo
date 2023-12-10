<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $roles = new Roles();
        $roles->nombre = $request->rol;
        $roles->save();
        return redirect()->back()->with('mensaje', 'Role: "' . $request->rol . '"; creado correctamente');
    }

    public function edit($id)
    {
        $role = Roles::find($id);
        return view('roles.editar', compact('role'));   
    }

    public function update(Request $request, $id)
    {
        $role = Roles::find($id);
        $role->nombre = $request->rol;
        $role->save();
        return redirect()->route('roles.index')->with('mensaje', 'Role: "' . $request->rol . '"; actualizado correctamente');
    }

    public function destroy($id)
    {
        $role = Roles::find($id);
        $role->delete();

        // TODO: Eliminar la relación con los usuarios

        return redirect()->back()->with('eliminar', true);
    }
}
