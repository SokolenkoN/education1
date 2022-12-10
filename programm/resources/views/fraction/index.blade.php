@extends('layouts.head')

@section('content')

        <a class="btn btn-primary" style="width:20%; margin: 40px 10% 0px" href="{{route('fraction.create')}}">Создать фракцию</a>

<div style="width: 80%; margin: 0px 10%">

    <h1>@foreach($fractions as $fraction) <br>
           <div><a href="{{route('fraction.show', $fraction->id)}}">{{$fraction->id}} - {{$fraction->title}}</a> </div>
@endforeach
    </h1>

</div>

@endsection

