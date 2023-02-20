<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todos = Todo::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        
        return view('home',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('add_todo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => ' nullable',
        ]);

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        //The has method returns true if the value is present on the request:
        if($request->has('completed')){
            $todo->completed = true;
        }

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return back()->with('success' , 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::where('id' , $id)->where('user_id' , Auth::user()->id)->first();
        if(!$todo){
            abort(404);
        }
        return view('delete_todo' , compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::where('id' , $id)->where('user_id' , Auth::user()->id)->first();
        if(!$todo){
            abort(404);
        }
        return view('edit_todo' , compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => ' nullable',
        ]);

        $todo = Todo::where('id' , $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        //The has method returns true if the value is present on the request:
        if($request->has('completed')){
            $todo->completed = true;
        }
        else{
            $todo->completed = false;
        }

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return back()->with('success' , 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::where('id' , $id)->where('user_id' , Auth::user()->id)->first();
        $todo->delete();
        return redirect()->route('todo.index')->with('success' , 'Item deleted successfully');
    }
}
