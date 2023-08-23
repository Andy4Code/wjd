<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function all()
    {

        $todos = Todo::all();
        $table = '
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody id="todos-list" name="todos-list">';
        foreach ($todos as $data) :
            $table .= '<tr id="todo' . $data->id . '">
                    <td>' . $data->id . '</td>
                    <td>' . $data->title . '</td>
                    <td>' . $data->desc . '</td>
                    <td class="d-flex">
                    <a href="' . route('todos.show', $data->id) . '" class="mx-1 btn btn-sm btn-secondry">view</a>
                    <a href="' . route('todos.edit', $data->id) . '" class="mx-1 btn btn-sm btn-primary">edit</a>
                    <button  data-id="'.$data->id.'" class=" btn-delete btn btn-sm btn-danger mx-1">Delete</button>
                    </td>
                </tr>';
        endforeach;
        $table .= '</tbody>
        </table>';

        return $table;
    }
    public function index()
    {
        $todos = Todo::all();
        return view('Todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Todo::create($request->validate([
            'title' => 'required|string',
            'desc' => 'string'
        ]));

        return response()->json(['message' => 'Created Successfully','status'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Todos.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Todos.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $x =  Todo::findOrFail($id);
        if($x->delete()){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'failed']);

        }
    }
}
