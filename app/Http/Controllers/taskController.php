<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskManagement;


class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $task = TaskManagement::all();
        return \response($task);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $validateData = $request->validate([
            'text' => 'required',
            'completed' => 'required'
        ]);
        
        $task = TaskManagement::create($validateData);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return TaskManagement::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        
        $task = TaskManagement::findOrFail($id);
        $task->update($request->all());

        return response()->json($task, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = TaskManagement::findOrFail($id);
        $task->delete();
        return 204;
    }
}
