@extends('layouts.default')

@section('title', 'Редактирование Статьи')

@section('content')
    <div class="form-control">
        <form method="post" class="form-control" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" value="{{ $article->title }}" class="form-control">
            </div>
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group mt-3">
                <div class="form-group">
                    <h5>Старое фото</h5>
                    <img src="{{ Storage::disk('images')->url($article->image) }}" width="150" height="150">
                </div>
                <label for="image"><a class="btn btn-info mt-3">Выбрать Новое фото?</a></label>
                <input type="file" name="image" id="image" class="form-control" hidden="hidden">
            </div>
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
                <label for="article">Статья</label>
                <textarea name="article" id="article" class="form-control">{{ $article->article }}</textarea>
            </div>
            @error('article')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group mt-3">
            <label for="category">Категория</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->articles->contains($article) ? 'selected' : '' }}
                >
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
            </div>
            @error('category')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>
@endsection
