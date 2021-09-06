@extends('layouts/main') 

@section('title','Parameters by URL')

@section('content')

    <h1> All parameters: </h1> 
    @if($id != null)
        <p> There is your id: {{$id}}</p>
    @endif

@endsection