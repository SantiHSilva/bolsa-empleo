<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

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
        $user_id = $usuario->id;
        $perfil = new Perfil();
        $perfil->presentacion = "Hola, soy " . $usuario->nombre . " " . $usuario->apellido .  " y esta es mi presentación";
        $perfil->users_id = $user_id;
        $perfil->save();
        return redirect()->back();
    }


    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    public function edit()
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();
        return view('perfil.editar', compact('perfil'));
    }

    public function update(Request $request)
    {
        $user_id  = auth()->user()->id;
        $perfil = Perfil::where('users_id', $user_id)->first();
        $perfil->presentacion = $request->presentacion;
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
