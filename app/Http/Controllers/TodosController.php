<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {   
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
 
        $todo->save();

        return redirect('/todos');
    }

    public function edit($todoId)
    {   
        $todo = Todo::find($todoId);
        return view('todos.edit')->with('todo', $todo);
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $data = request()->all();
        
    }
}
