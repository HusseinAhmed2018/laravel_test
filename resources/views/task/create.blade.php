@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task</div>

                    <div class="card-body">
                        <form action="{{ route('store.task') }}" method="post">
                            @csrf

                            <input type="text" placeholder="task_name" name="task_name">

                            <select name="project_id" id="">
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
