<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\Perfil;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills  = Skills::all();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $skills = new Skills();
        $skills->nombre = $request->skill;
        $skills->save();
        return redirect()->back()->with('mensaje', 'Skill: "' . $request->skill . '"; creado correctamente');
    }

    public function edit($id)
    {
        $skill = Skills::find($id);
        return view('skills.editar', compact('skill'));   
    }

    public function update(Request $request, $id)
    {
        $skill = Skills::find($id);
        $skill->nombre = $request->skill;
        $skill->save();
        return redirect()->route('skills.index')->with('mensaje', 'Skill: "' . $request->skill . '"; actualizado correctamente');
    }

    public function destroy($id)
    {
        $skill = Skills::find($id);

        // Eliminar la relación con los usuarios
        $users = Perfil::all();
        foreach ($users as $user) {
            $skillstemp = explode(",", $user->skills);
            $skillstemp = array_diff($skillstemp, [$skill->nombre]);
            $user->skills = implode(",", $skillstemp);
            $user->save();

        }

        $skill->delete();
        return redirect()->back()->with('eliminar', true);
    }
}
