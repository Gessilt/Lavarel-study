@extends('layouts.main')

@section('title','HDC Events')

@section('content')

<div id='search-container' class='col-md-12'>
    <h1> Search one event </h1>
    <form action=''>
        <input type='text' id='search' name='search' class='form-control' placeholder='Search'>
    </form>
</div>
<div id='events-container' class='col-md-12'>
    <h2> Next events </h2>
    <p class='subtitle'> See the events of next days</p>
    <div id='card-container' class='row'>
        @foreach($events as $eventData)
            <div class = 'card col-md-3'> 
                <div class='card-body'>
                    <p class='card-date'>10/09/2020 </p>
                    <h5 class='card-title'> {{$eventData->title}} </h5>
                    <p class='card-participants'> x Participants </pc>
                    <a href="#" class="btn btn-primary"> Know more </a>
                </div>
            </div>
        @endforeach
    </div>


</div>

@endsection
