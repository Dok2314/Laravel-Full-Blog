@extends('layouts.default')

@section('title', 'Результаты поиска')

@section('content')
    <h2>Юзеры с похожим именем:</h2>
    @if($results->count() > 0)
        @foreach($results as $result)
            <a href="{{ route('users.user_preview', $result) }}"><button class="btn btn-info">{{$result->name}}</button></a>
            <br>
        @endforeach
    @else
        <div class="alert alert-warning" style="text-align: center; font-weight: bolder;">
            Не найдено совпадений!
        </div>
    @endif
@endsection
