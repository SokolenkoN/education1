@extends('layouts.admin')
@section('content')
    <form action="{{route('character.store')}}" method="post" class="input-form" style="width:40%; margin: 20px auto 0 auto">
        @csrf
        <div class="mb-3">
            <label for="character">Персонаж</label>
            <input type="text" name="name" class="form-control" id="character" placeholder="Введите Имя и Фамилию персонажа">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age">Возраст</label>
            <input name="age" type="number" class="form-control" id="age" placeholder="Введите возраст персонажа">

        </div>
        <div class="mb-3">
            <label for="biography">Биография</label>
            <input name="biography" type="text" class="form-control" id="biography" placeholder="История персонажа">
        </div>
        <div class="mb-3">
            <label for="obituary">Некролог</label>
            <input name="obituary" type="text" class="form-control" id="obituary" placeholder="Расскажите о смерте">
        </div>
        <div class="mb-3">
            <label for="fraction_id">В какой фракции состоит персонаж?</label>
            <select class="form-select" aria-label="Default select example" name="fraction_id">

                @foreach($fractions as $fraction)
                    <option value="{{$fraction->id}}">{{$fraction->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="events">В каких событиях учавствовал персонаж?</label>
            <select class="form-control" multiple aria-label="multiple select example" id="events" name="events[]">

                @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check-inline" style="display: flex; gap: 20px; margin-bottom: 20px">
            <input class="form-check-input" name="health" type="checkbox" value="Жив" id="health" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Персонаж жив?
            </label>
        </div>
        <div class="mb-3">
            <label for="user_id">Владелец</label>
            <input name="user_id" type="number" class="form-control" id="user_id" placeholder="Введите возраст персонажа" value="{{Auth::user()->id}}">

        </div>
        <button type="submit" class="btn btn-primary" style="margin: 0 auto">Отправить</button>
    </form>
@endsection
