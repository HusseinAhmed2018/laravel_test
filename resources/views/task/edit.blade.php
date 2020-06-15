@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form action="{{ route('task.update',[$task->id]) }}" method="post">
                            {{ method_field("PUT") }}
                            @csrf

                            <input type="text" placeholder="task_name" name="task_name" value="{{ $task->task_name }}">

                            <select name="project_id" id="">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                                @endforeach
                            </select>

                            <select name="status" id="">
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : ''  }}>In Progress</option>
                                <option value="done" {{ $task->status == 'done' ? 'selected' : ''  }}>Done</option>
                            </select>

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
