<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public  function  index(){
        return view('Todos.index',[
            'todos' => Todo::all()
        ]);
    }
    public  function  show(Todo $todo){
        return view('Todos.show',[
            'todo' => $todo
        ]);
    }

    public function  create(){
        return view('Todos.create');
    }

    public  function store(Request $request){

        $this->validate(request(),[
            'name' => 'required|min:6|max:12',
            'description'=>'required'
        ]);
        $todo = new Todo();
        $todo -> name = $request -> name;
        $todo->description = $request->description;
        $todo->completed = false;
        $todo->save();
        return redirect('/todos');
    }
    public  function edit(Todo $todo){
        return view('Todos.edit',[
            'todo' => $todo
        ]);
    }

    public  function update(Request $request,Todo $todo){

        $this->validate(request(),[
            'name' => 'required|min:6|max:12',
            'description'=>'required'
        ]);
$todo->name = $request->name;
$todo->description = $request->description;
$todo->save();
return redirect('/todos');
    }
    public  function destroy(Todo $todo){
$todo->delete();
return redirect('/todos');
    }
}
