<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Models\category;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["tasks"] = task::where('created_by', Auth::id())->get();
        return view("tasks.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        $data["task_status"] = TaskStatus::asSelectArray();
        $data["categories_list"] = category::where('created_by', Auth::id())->get();
        // [
        //     asSlectArray value tule ane
        //     'value' => 'description'
        // ]
        // [
        //     array te jokhon pay
        //     'key' => 'value'
        // ]

        return view("tasks.create", $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new task();
        $task->name = $request->name;
        $task->category_id = $request->category_id;
        $task->details = $request->details;
        $task->deadline = $request->deadline;
        $task->status = $request->status;
        $task->created_by  = Auth::id();
        $task->save();
        return redirect("/tasks");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = task::where('created_by', Auth::id())->find($id);
        if (!$task) {
            return redirect('/task');
        }
        $data["task"] = $task;
        $data["task_status"] = TaskStatus::asSelectArray();
        $data["categories_list"] = category::where("created_by", Auth::id())->get();
        return view("tasks.edit", $data);
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
        $task = task::where('created_by', Auth::id())->find($id);
        if (!$task) {
            return redirect('/task');
        }
        $task->name = $request->name;
        $task->category_id = $request->category_id;
        $task->details = $request->details;
        $task->deadline = $request->deadline;
        $task->status = $request->status;
        $task->created_by =Auth::id();
        $task->save();
        return redirect("/tasks");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::where('created_by', Auth::id())->find($id);
        if (!$task) {
            return redirect('/tasks');
        }
        $task->delete();
        return redirect('/tasks');
    }
}
