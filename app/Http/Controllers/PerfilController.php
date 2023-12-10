<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Skills;

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
        return view('perfil.editar', compact('perfil', 'skills'));
    }

    public function update(Request $request)
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();
        $perfil->presentacion = $request->presentacion;

        $skills = Skills::all();
        $temp = array();
        foreach($skills as $skill){
            if($request->has($skill->nombre)){
                array_push($temp, $skill->nombre);
                echo($skill->nombre . " TRUE " . $request->has($skill->nombre) . "<br>");
            }else{
                echo($skill->nombre . " FALSE " . $request->has($skill->nombre) . "<br>");
            }
        }

        $perfil->skills = implode(",", $temp);

        $perfil->save();
        return redirect()->route('perfil.view')->with('mensaje', 'Perfil actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
