<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $todos = Todo::where('users_id', $user_id)->get();
        return view('todo.all', compact('todos'));
    }


    public function create()
    {

        //
    }


    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->users_id = $user_id;
        $todo->save();
        return redirect()->back();
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
