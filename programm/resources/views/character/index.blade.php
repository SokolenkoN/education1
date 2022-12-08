@extends('layouts.head')

@section('content')

        <a class="btn btn-primary" style="width:20%; margin: 40px 10% 0px" href="{{route('character.create')}}">Создание персонажа</a>

<div style="width: 80%; margin: 0px 10%">

    <h1>@foreach($characters as $character) <br>
           <div><a href="{{route('character.show', $character->id)}}">{{$character->id}} - {{$character->name}}</a> </div>
@endforeach
    </h1>

</div>

@endsection

