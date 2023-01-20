@extends('layouts.head')

@section('content')

    <form action="{{route('fraction.store')}}" method="post" class="input-form" style="width:10%; margin: 20px auto 0 auto">
        @csrf
        <div class="form-group">
            <label for="fraction">Фракция</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Введите название Фракции">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
        <label for="fraction">Описание</label>
        <input type="text" name="description" class="form-control" id="fraction" placeholder="Введите описание Фракции">
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 10px ">Создать</button>
    </form>
@endsection
