@extends('layouts.head')
@section('content')

    <div style="width:90%; margin: 20px auto 0 auto">
            <div class="me-3">Имя: {{$character->name}}</div>
            <div class="me-3">Возраст: {{$character->age}}</div>
            <div class="me-3">Биография: {{$character->biography}}</div>
            <div class="me-3">Некролог: {{$character->obituary}}</div>
            <div class="me-3">Статус: {{$character->health}}</div>
        Состоит во фракции:
        {{$character->fraction->title}}<br>

        Пережил такие события как:
        @foreach($events as $event)
            <br>
            - {{$event->title}}
        @endforeach

    <div>

        <form action="{{route('character.destroy', $character->id)}}" method="post">
            @csrf
            @method('DELETE')
            <a class="btn btn-primary" style="margin: 20px auto" href="{{route('character.edit', $character->id)}}">Отредоктировать</a>
            <button type="submit" class="btn btn-danger delete-btn" style="margin: 20px 5px" >Удалить</button>
            <a class="btn btn-primary" style="margin: 20px 20px" href="{{route('character.index')}}">Назад</a>

        </form>

@endsection

