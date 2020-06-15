@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>task name</th>
                                    <th>project name</th>
                                    <th>status</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->project->project_name }}</td>
                                <td>{{ $task->status }}</td>
                                <td><a href="{{ route('task.edit',[$task->id]) }}" class="btn btn-primary">edit</a></td>
                                <td>
                                    <form action="{{ route('task.delete',[$task->id]) }}" id="delete_form" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                               value="delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
