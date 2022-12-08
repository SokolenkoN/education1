@extends('layouts.head')

@section('content')

    <form action="{{route('fraction.update', $fraction->id)}}" method="post" class="input-form" style="width: 40%; margin: 20px auto 0 auto">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="character">Фракция</label>
            <input type="text" name="title" class="form-control" id="fraction" placeholder="Введите название Фракции" value="{{$fraction->title}}">
            <label for="fraction">Описание</label>
            <input type="text" name="description" class="form-control" id="fraction" placeholder="Введите описание Фракции" value="{{$fraction->description}}">
            </div>

        <button type="submit" class="btn btn-primary" style="margin: 0 auto">Отредоктировать</button>
        <a class="btn btn-primary" style="margin: 20px 20px" href="{{route('fraction.show', $fraction->id)}}">Назад</a>
    </form>
@endsection
