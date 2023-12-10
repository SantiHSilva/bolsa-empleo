<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $user_id  = auth()->user()->id;
        $empresa = Empresa::where('users_id', $user_id)->first();
        return view('empresa.miempresa', compact('empresa'));
    }

    public function create()
    {
        if(Empresa::where('users_id', auth()->user()->id)->exists()){
            return redirect()->back();
        }
        return view('empresa.create');   
    }

    public function store(Request $request)
    {
        
        $user_id  = auth()->user()->id;
        
        if(Empresa::where('users_id', $user_id)->exists()){
            return redirect()->route('home');
        }
        
        $empresa = new Empresa();
        $empresa->nit = $request->nit;
        $empresa->nombre = $request->nombre;
        $empresa->ciudad = $request->ciudad;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->sector = $request->sector;
        $empresa->descripcion = $request->descripcion;
        $empresa->fecha_creacion = $request->fecha_creacion;

        $empresa->users_id = $user_id;

        print_r($request->all());
        
        $empresa->save();
        return redirect()->route('empresa.index')->with('mensaje', 'Empresa creada correctamente');
    }

    public function show(Empresa $empresa)
    {
        //
    }

    public function edit(Empresa $empresa)
    {
        //
    }

    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    public function destroy(Empresa $empresa)
    {
        //
    }
}
