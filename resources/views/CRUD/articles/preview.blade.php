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
                            <form action="{{ route('like.like', $article) }}" method="post">
                                @csrf
                                    <button type="submit"
                                            class="border-0 bg-transparent"
                                            style="color:
                                        @auth
                                            {{ Auth::user()->likes->contains($article->id) ? 'red' : 'silver' }}
                                            @endauth
                                                ">
                                        <b>Like? ({{ $article->users->count() }})</b>
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                            </form>
                        </span>
                        <h4 class="mb-4">Оставьте свой коментарий</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="comments-container">


                            <!-- Contenedor Principal -->
                            <div class="comments-container">
                                <h1>Всего коментариев статьи: <strong style="color: green;">"{{ $article->title }}"</strong>:</h1>

                                <div class="col-12">
                                    <div class="comments">
                                        <div class="comments-details">
                                            <span class="total-comments comments-sort">{{ $comments->count() }} Ком.</span>
                                            <span class="dropdown">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Sort By <span class="caret"></span></button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Top Comments</a>
              <a href="#" class="dropdown-item">Newest First</a>
              </div>
          </span>
                                        </div>
                                        <div class="comment-box add-comment">
                                            <form action="{{ route('comment.create') }}" method="post">
                                                @csrf
                                                <input type="text" name="title" id="title" placeholder="Введите название" value="{{ old('title') }}" class="form-control">
                                                <br>
                                                <input name="comment" id="comment" class="form-control" value="{{ old('comment') }}" placeholder="Ваш коментарий">
                                                <input type="hidden" name="parent_id" value="">
                                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                                <button type="submit" class="btn btn-default">Сохранить</button>
                                            </form>
                                        </div>

                                        @foreach($comments as $comment)
                                            @include('CRUD.articles.comments.body', compact('article'))
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                {{ $comments->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@push('links')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/comment.js') }}"></script>
@endpush
