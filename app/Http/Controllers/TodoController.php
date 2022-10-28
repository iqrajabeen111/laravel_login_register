<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\User;
class TodoController extends Controller
{
    //
    public function index()
    {
        // print_r("working");
        // $branch = new Branches;
        // $TodoItem = Todo::all();
        $user = Auth::user();
        // print_r($user->id);
        // $TodoItem = Todo::find($user->id);

        // $TodoItem= Todo::find(2)->tasks;  
        $TodoItem = Todo::with('users')->where('user_id', $user->id)->get();
        // $TodoItem = $Todo->tasks();
        // print_r($TodoItem->title); 

        // $TodoItem = Todo::all();
        return view('Todo/ListTodo',compact('TodoItem'));
        //
    }
    public function create()
    {
        // $TodoItem = Todo::all();
        // print_r($TodoItem);
        return view('Todo/addtodo');
        //
    }
    public function show($id)
    {
        // $tasks = auth()->user()->user;
        // print_r($tasks);
        //
        // $Todo = new Todo;
        // $shops_names = $Todo->tasks();
        // print_r($shops_names);
        $user = Auth::user();
        // print_r($user->id);
        // $TodoItem = Todo::find($user->id);

        // $TodoItem= Todo::find(2)->tasks;  
        $TodoItem = Todo::with('users')->where('user_id', $user->id)->get();
        // $TodoItem = $Todo->tasks();
        // print_r($TodoItem->title); 

        // $TodoItem = Todo::all();
        return view('Todo/ListTodo',compact('TodoItem'));
        // print_r("working");
    }

    public function store(TodoRequest $request)
    {
        // print_r($request);
        $user = Auth::user();
        // print_r( $user->id);
        // $data = $request->validated();
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->input('completed'),
            'user_id'=> Auth::id(),
        ];

        
        Todo::create($data);
        return redirect()->back()->with('message', 'Task Added Successfully');
        //
    }


}
