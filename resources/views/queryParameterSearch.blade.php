@extends('layouts/main') 

@section('title','Parameters by URL')

@section('content')

    <h1> All parameters: </h1> 
    @if($search != null)
        <p> There is your search: {{$search}}</p>
    @endif

@endsection