<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('project.index',compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        Project::create([
            'project_name'  => $request->project_name,
            'user_id'       => Auth::id()
        ]);
        return redirect()->route('projects');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit',compact('project'));
    }

    public function update(Request $request,$id)
    {
        $project = Project::find($id);
        $project->update([
            'project_name'  => $request->project_name,
        ]);

        return redirect()->route('projects');
    }

    public function destory(project $project)
    {
        $project = Project::find($project->id);
        $project->delete();

        return redirect()->route('projects');
    }
}
