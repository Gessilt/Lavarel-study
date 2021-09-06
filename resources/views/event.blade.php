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
                <img src="/img/events/{{$eventData->image}}" alt="{{ $eventData->title }}">
                <div class='card-body'>
                    Tu<p class='card-date'> {{date('d/m/y'), strtotime($eventData->date)}} </p>
                    <h5 class='card-title'> {{$eventData->title}} </h5>
                    <p class='card-participants'> x Participants </pc>
                    <a href="/events/{{$eventData->id}}" class="btn btn-primary"> Know more </a>
                </div>
            </div>
        @endforeach
        @if (count($events) == 0) 
            <p> None event available </p>
        @endif
    </div>


</div>

@endsection
