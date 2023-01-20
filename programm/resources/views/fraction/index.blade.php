@extends('layouts.head')

@section('content')

        <a class="btn btn-primary" style="width:15%; margin: 40px 40% 0px" href="{{route('fraction.create')}}">Создать фракцию</a>

<div style="width: 40%; margin: 20px 40% auto">

    <h1>@foreach($fractions as $fraction) <br>
           <div><a href="{{route('fraction.show', $fraction->id)}}">{{$fraction->id}} - {{$fraction->title}}</a> </div>
@endforeach
    </h1>

</div>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            вы авторизованны
        </div>

@endsection

