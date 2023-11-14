<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        // Verificar si el usuario tiene tareas
        $todo = Todo::all();
        return view('home', compact('todo'));
    }


    public function create()
    {

        //
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'todo' => 'required'
        ]);
        $todo = Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo created successfully');
    }


    public function show($id)
    {
        //
        $todo = Todo::find($id);
    }


    public function edit(Todo $todo)
    {
        //
    }


    public function update(Request $request, Todo $todo)
    {
        //
    }


    public function destroy(Todo $todo)
    {
        //
    }
}
