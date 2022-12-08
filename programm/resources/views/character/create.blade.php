@extends('layouts.head')

@section('content')

    <form action="{{route('character.store')}}" method="post" class="input-form" style="width:15%; margin: 20px auto 0 auto">
        @csrf
        <div class="mb-3">
            <label for="character">Персонаж</label>
            <input type="text" name="name" class="form-control" id="character" placeholder="Введите Имя и Фамилию персонажа">
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

            <div class="form-check-inline" style="display: flex; gap: 20px; margin-bottom: 10px">
                <input class="form-check-input" name="health" type="checkbox" value="Жив" id="health" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Персонаж жив?
                </label>
            </div>

        <button type="submit" class="btn btn-primary" style="margin: 0 auto">Отправить</button>
    </form>
@endsection
