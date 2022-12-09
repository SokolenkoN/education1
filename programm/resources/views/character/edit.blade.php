@extends('layouts.head')

@section('content')

    <form action="{{route('character.update', $character->id)}}" method="post" class="input-form" style="width: 40%; margin: 20px auto 0 auto">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="character">Персонаж</label>
            <input type="text" name="name" class="form-control" id="character" placeholder="Введите Имя и Фамилию персонажа" value="{{$character->name}}">
        </div>
        <div class="mb-3">
            <label for="age">Возраст</label>
            <input name="age" type="number" class="form-control" id="age" placeholder="Введите возраст персонажа" value="{{$character->age}}">
        </div>
        <div class="mb-3">
            <label for="biography">Биография</label>
            <input name="biography" type="text" class="form-control" id="biography" placeholder="История персонажа" value="{{$character->biography}}">
        </div>
        <div class="mb-3">
            <label for="obituary">Некролог</label>
            <input name="obituary" type="text" class="form-control" id="obituary" placeholder="Расскажите о смерте" value="{{$character->obituary}}">
        </div>
        <div  style="margin-bottom: 20px">
            <label for="fraction_id">В какой фракции состоит персонаж?</label>
            <select class="form-select" aria-label="Default select example" name="fraction_id">

                @foreach($fractions as $fraction)
                    <option {{$fraction->id === $character->fraction->id ? ' selected' : ''}} value="{{$fraction->id}}">{{$fraction->title}}</option>
                @endforeach
            </select>
        </div>
            <div class="form-check-inline" style="display: flex; gap: 20px; margin-bottom: 0px">
                <input class="form-check-input" name="health" type="checkbox" value="Жив" id="health">
                <label class="form-check-label" for="flexCheckChecked">
                    Персонаж жив?
                </label>
            </div>

        <button type="submit" class="btn btn-primary" style="margin: 0 auto">Отредоктировать</button>
        <a class="btn btn-primary" style="margin: 20px 20px" href="{{route('character.show', $character->id)}}">Назад</a>
    </form>
@endsection
