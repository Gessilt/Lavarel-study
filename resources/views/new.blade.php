@extends('layouts/main') 

@section('title','Local parameters')

@section('content')

        <h1> New page </h1>

        @if(10 > 5)
            <p> The condition is true </p>
        @endif

        <p> {{ $name }} </p>

        @if($name  == "Matheus")
            <p> Hi, Matheus, you're {{$age}} years old </p>
        @else
            <p> The name is {{ $name }}, you're {{$age}} years old </p>
        @endif

        @for($i = 0; $i < count($numbers); $i++)
            @if ($numbers[$i] % 2 == 0)
                <p> {{$numbers[$i]}} - {{$i}}; O número é par </p>
            @else 
                <p> {{$numbers[$i]}} - {{$i}}; O número é ímpar </p>
            @endif
        @endfor
        <!-- Podemos chamar o php, com o @ php -- @ endphp -->
        {{-- Comentário do blade, é único e exclusivo do blade --}}
        @foreach($names as $nome)
            <p> {{ $nome }} - {{ $loop->index }} </p>
        @endforeach

@endsection
