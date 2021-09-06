@extends('layouts/main') 

@section('title','Create')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1> Insert your event </h1>
    <form action = '/events' method='POST'> 
        @csrf
        <div class="form-group">
            <label for='title'> Event: </label>
            <input type='text' class='form-control' id='title' name='title' placeholder='Name of event'>
        </div>
        <div class="form-group">
            <label for='city'> City: </label>
            <input type='text' class='form-control' id='city' name='city' placeholder='Name of city'>
        </div>
        <div class="form-group">
            <label for='private'> The event is private? </label>
            <select name='private' id='private' class='form-control'>
                <option value='0'> No </option>
                <option value='0'> Yes </option>
            </select>
        </div>
        <div class="form-group">
            <label for='description'> Description: </label>
            <textarea name='description' id='description' class='form=control' placeholder='Tell more of the event'></textarea>
        </div>
        <input type='submit' class='btn btn-primary' value='Create event'>
    </form>

</div>

@endsection