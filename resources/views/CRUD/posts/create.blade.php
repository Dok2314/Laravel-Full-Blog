@extends('layouts.default')

@section('title', 'Создание поста')

@section('content')
    <div class="form-control">
        <form action="" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="post">Пост</label>
                <textarea name="post" id="post" class="form-control"></textarea>
            </div>
            @error('post')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Создать</button>
        </form>
    </div>
@endsection
