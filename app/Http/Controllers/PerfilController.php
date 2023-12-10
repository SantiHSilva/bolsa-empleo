<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Skills;
use App\Models\Roles;

class PerfilController extends Controller
{

    public function index()
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();
        return view('perfil.miperfil', compact('perfil'));
    }

    public function create()
    {
        $usuario = auth()->user();
        if(Perfil::where('users_id', $usuario->id)->exists()){
            return redirect()->back();
        }
        $user_id = $usuario->id;
        $perfil = new Perfil();
        $perfil->presentacion = "Hola, soy " . $usuario->nombre . " " . $usuario->apellido .  " y esta es mi presentación";
        $perfil->users_id = $user_id;
        $perfil->save();
        return redirect()->route('perfil.view')->with('mensaje', 'Perfil creado correctamente');
    }


    public function store(Request $request)
    {

    }


    public function show(Perfil $perfil)
    {
        //
    }

    public function edit()
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();

        $skills = Skills::all();
        $roles = Roles::all();
        return view('perfil.editar', compact('perfil', 'skills', 'roles'));
    }

    public function update(Request $request)
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();
        
        // Guardar presentación
        $perfil->presentacion = $request->presentacion;

        // Guardar skills
        $skills = Skills::all();
        $temp = array();
        foreach($skills as $skill){
            if($request->has($skill->nombre)){
                array_push($temp, $skill->nombre);
            }
        }
        $perfil->skills = implode(",", $temp);

        // Guardar roles
        $roles = Roles::all();
        $temp2 = array();
        foreach($roles as $rol){
            if($request->has($rol->nombre)){
                array_push($temp2, $rol->nombre);
            }
        }
        $perfil->roles = implode(",", $temp2);

        $perfil->save();
        return redirect()->route('perfil.view')->with('mensaje', 'Perfil actualizado correctamente');
    }

    public function destroy(Perfil $perfil)
    {
        // $perfil->delete(); xd
    }
}
