<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();

        return view('task.index',compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();

        return view('task.create',compact('projects'));
    }

    public function store(Request $request)
    {
        Task::create([
            'task_name'     => $request->task_name,
            'project_id'    => $request->project_id,
        ]);
        return redirect()->route('tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $projects = Project::all();

        return view('task.edit',compact('projects','task'));
    }

    public function update(Request $request,$id)
    {
        $task = Task::find($id);
        $task->update($request->all());

        return redirect()->route('tasks');
    }

    public function destory(task $task)
    {
        $task = Task::find($task->id);
        $task->delete();

        return redirect()->route('tasks');
    }
}
