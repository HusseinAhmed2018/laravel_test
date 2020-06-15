@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>project name</th>
                                    <th>tasks count</th>
                                    <th>status</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->tasks->count() }}</td>
                                    <td>
                                        @if($project->hasTask())
                                        {{ $project->status > 0 ? 'in progress' : 'Done' }}
                                        @else
                                            not have tasks yet!
                                        @endif
                                    </td>
                                    <td><a href="{{ route('project.edit',[$project->id]) }}" class="btn btn-primary">edit</a></td>
                                    <td>
                                        <form action="{{ route('project.delete',[$project->id]) }}" id="delete_form" method="POST">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
