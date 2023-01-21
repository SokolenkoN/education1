@extends('layouts.head')

@section('content')
    <div style="width: 80%; margin: 30px 10%">
        <h1>Прошедшие события </h1>
    <h1>@foreach($events as $event) <br>
        <div>{{$event->id}} - {{$event->title}} </div>
        @endforeach
    </h1>
    </div>

@endsection
