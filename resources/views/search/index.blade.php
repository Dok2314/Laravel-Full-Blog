@extends('layouts.default')

@section('title', 'Результаты поиска')

@section('content')
    <h2>Статьи с похожим названием:</h2>
    @if($results->count() > 0)
    @foreach($results as $result)
       <a href="{{ route('articles.preview', $result) }}"><button class="btn btn-info">{{$result->title}}</button></a>
       <br>
    @endforeach
    @else
        <div class="alert alert-warning" style="text-align: center; font-weight: bolder;">
            Не найдено совпадений!
        </div>
    @endif
@endsection
