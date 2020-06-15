@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project</div>

                    <div class="card-body">
                        <form action="{{ route('store.project') }}" method="post">
                            @csrf

                            <input type="text" placeholder="project_name" name="project_name">

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
