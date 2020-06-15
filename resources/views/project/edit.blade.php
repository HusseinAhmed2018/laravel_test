@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project</div>

                    <div class="card-body">
                        <form action="{{ route('project.update',[$project->id]) }}" method="post">
                            {{ method_field("PUT") }}
                            @csrf

                            <input type="text" placeholder="project_name" name="project_name" value="{{ $project->project_name }}">

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
