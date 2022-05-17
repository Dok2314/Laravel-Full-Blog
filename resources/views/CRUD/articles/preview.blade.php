@extends('layouts.default')

@section('title', 'Статья')

@section('content')
    <div class="card">
        <div class="card-header">
           Название:  <strong>{{ $article->title }}</strong>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ Storage::disk('images')->url($article->image) }}" width="500" height="500">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">
                                Категория:
                                <cite title="Source Title" style="color: green">
                                    {{ $article->category->title }}
                                </cite>
                            </footer>
                            <footer class="blockquote-footer">
                                Теги:
                                @foreach($tags as $tag)
                                    <cite title="Source Title" style="color: blue">
                                        {{ $tag->title }}
                                    </cite>
                                @endforeach
                            </footer>
                            <p>Статья: <strong>{{ Str::limit($article->article, 150) }}</strong></p>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Статья показалась вам полезной?</h4>
                        <span>
                            <strong style="color: green">
                                Like?(251)
                            </strong>
                        </span>
                        <h4 class="mb-4">Оставьте свой коментарий</h4>
                        <form action="{{ route('comment.create') }}" method="post" class="form-control">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="form-group mt-3">
                                <label for="title" class="mb-3">Название Коментария</label>
                                <input type="text" name="title" id="title" placeholder="Введите название" value="{{ old('title') }}" class="form-control">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group mt-3">
                                <label for="comment" class="mb-3">Коментарий</label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Ваш коментарий">{{ old('comment') }}</textarea>
                            </div>
                            @error('comment')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn btn-primary mt-3">Сохранить</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h4>Мнения пользователей о статье <strong style="color: green;">"{{ $article->title }}"</strong>:</h4>
                        @foreach($comments as $comment)
                        <div class="card text-center  mt-3">
                            <div class="card-header">
                                {{ $comment->title }}
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $comment->comment }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                Коментарий оставлен: {{ $comment->created_at }} <br>
                                Пользователем:
                            </div>
                        </div>
                        @endforeach
                        <div class="mt-3">
                            {{ $comments->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
