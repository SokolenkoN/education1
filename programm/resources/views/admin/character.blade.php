@extends('layouts.admin')
@section('content')
    <div style="width: 450px">

        @foreach($characters as $character) <br>
        <div><a href="{{route('character.show', $character->id)}}">{{$character->id}} - {{$character->name}}</a></div>
        @endforeach

        <div class="mt-3">
            {{$characters->withQueryString()->links()}}
        </div>
    </div>

    <form action="{{route('admin.character')}}" method="GET"
          style="width: 350px; display: flex; flex-direction: column; align-items: center;">
        <div class="mb-3" style="width: 100%;">
            <label for="character" class="form-label">Поиск</label>
            <input type="text" name="name" id="name" @if(isset($_GET['name'])) value="{{$_GET['name']}}"
                   @endif class="form-control" placeholder="Введите Имя или Фамилию персонажа">
        </div>
        <div class="mb-3" style="width: 100%;">
            <div class="form-label">Выберите фракцию</div>
            <select name="fraction_id" id="fraction_id" class="form-select form-select-sm"
                    aria-label=".form-select-sm example">
                <option></option>
                @foreach($fractions as $fraction)
                    <option value="{{$fraction->id}}"
                            @if(isset($_GET['fraction_id'])) @if($_GET['fraction_id'] == $fraction->id) selected @endif @endif>{{$fraction->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" style="width: 100%;">
            <label for="character" class="form-label">Возраст</label>
            <input type="text" name="age" id="age" @if(isset($_GET['age'])) value="{{$_GET['age']}}"
                   @endif class="form-control" placeholder="Введите возраст персонажа">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 50%">Найти</button>
    </form>

@endsection
