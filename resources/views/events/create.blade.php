@extends('layouts/main') 

@section('title','Create')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1> Insert your event </h1>
    <form action = '/events' method='POST' enctype="multipart/form-data" > 
        @csrf
        <div class="form-group">
            <label for='title'> Image: </label>
            <input type='file' class='form-control-file' id='image' name='image'>
        </div>
        <div class="form-group">
            <label for='title'> Event: </label>
            <input type='text' class='form-control' id='title' name='title' placeholder='Name of event'>
        </div>
        <div class="form-group">
            <label for='title'> Event date: </label>
            <input type='date' name='date' id='date' class='form-control' placeholder='When will happen?'></input>
        </div>
        <div class="form-group">
            <label for='title'> City: </label>
            <input type='text' class='form-control' id='city' name='city' placeholder='Name of city'>
        </div>
        <div class="form-group">
            <label for='title'> The event is private? </label>
            <select name='private' id='private' class='form-control'>
                <option value='0'> No </option>
                <option value='0'> Yes </option>
            </select>
        </div>
        <div class="form-group">
            <label for='title'> Description: </label>
            <textarea name='description' id='description' class='form-control' placeholder='Tell more about the event'></textarea>
        </div>
        <div class="form-group">
            <label for='title'> Add infrastructure items: </label>
            <div class="from-group">
                <input type='checkbox' name='items[]' value='Chairs'> Chairs 
            </div>
            <div class="from-group">
                <input type='checkbox' name='items[]' value='Stage'> Stage 
            </div>
            <div class="from-group">
                <input type='checkbox' name='items[]' value='OpenBar'> OpenBar 
            </div>
            <div class="from-group">
                <input type='checkbox' name='items[]' value='OpenFood'> OpenFood 
            </div>
            <div class="from-group">
                <input type='checkbox' name='items[]' value='Gifts'> Gifts 
            </div>
        </div>
        <input type='submit' class='btn btn-primary' value='Create event'>
    </form>

</div>

@endsection