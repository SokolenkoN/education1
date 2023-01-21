@extends('layouts.head')

@section('content')

        <a class="btn btn-primary" style="width:15%; margin: 10px 10px 10px" href="{{route('fraction.create')}}">Создать фракцию</a>

<div >

    <h1>@foreach($fractions as $fraction) <br>
           <div><a href="{{route('fraction.show', $fraction->id)}}">{{$fraction->id}} - {{$fraction->title}}</a> </div>
@endforeach
    </h1>

</div>


@endsection

