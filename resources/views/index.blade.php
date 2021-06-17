@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5 mb-5">jobs.at coding exercise</h1>
        </div>
    </div>

    <div id="app">
        <job-list :jobs='@json($jobs)'></job-list>
    </div>

@endsection
