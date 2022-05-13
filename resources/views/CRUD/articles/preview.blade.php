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
                    <img src="{{ Storage::disk('images')->url($article->image) }}">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Статья: <strong>{{ $article->article }}</strong></p>
                            <footer class="blockquote-footer">
                                Категория:
                                <cite title="Source Title" style="color: blue">
                                    {{ $article->category->title }}
                                </cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <h4>Статья показалась вам полезной?</h4>
            <span>
                <strong style="color: green">
                    Like?(251)
                </strong>
            </span>
        </div>
    </div>
@endsection
