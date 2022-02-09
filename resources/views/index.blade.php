@extends('layout.default')

@section('content')
    <Home :jobs="@json($jobs)" />
@stop

