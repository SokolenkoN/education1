@extends('layouts.head')
@section('content')

    <div style="width:90%; margin: 20px auto 0 auto">
        <div class="me-3">Название: {{$fraction->title}}</div>
        <div class="me-3">Описание: {{$fraction->description}}</div>
        <div>
            <div>
                Члены фракии:
                @foreach($fraction->characters as $character)
                    <br>
                    -{{$character->name}}
                @endforeach
            </div>
            <form action="{{route('fraction.destroy', $fraction->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-primary" style="margin: 20px auto" href="{{route('fraction.edit', $fraction->id)}}">Отредоктировать</a>
                <button type="submit" class="btn btn-danger delete-btn" style="margin: 20px 5px">Удалить</button>
                <a class="btn btn-primary" style="margin: 20px 20px" href="{{route('fraction.index')}}">Назад</a>

            </form>

@endsection

