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

    public function show(Todo $todo)
    {
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

        session()->flash('sukses', 'Berhasil Menyimpan data');
        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {   
        return view('todos.edit')->with('todo', $todo);
    }

    public function update()
    {
        
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        

        $data = request()->all();

        $todo = Todo::find($data['todo_id']);
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('sukses', 'Berhasil Mengupdate data');
        
        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {

        $todo->delete();
        session()->flash('sukses', 'Berhasil Menghapus data');
        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('sukses', $todo->name.' Complete');
        return redirect('/todos');
    }

    public function uncomplete(Todo $todo)
    {
        $todo->completed = false;
        $todo->save();
        session()->flash('sukses', $todo->name.' Uncomplete');
        return redirect('/todos');
    }
}
