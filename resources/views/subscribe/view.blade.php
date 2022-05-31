@extends('layouts.default')

@section('title', 'Подписки')

@section('content')
    <h3>Выбирите подписку:</h3>
        <div class="container">
             <ul>
                 <li class="mb-2">
                     <a href=""><button class="btn btn-info">Рассылка на выход новой статьи</button></a>
                 </li>
                 <li class="mb-2">
                     <a href=""><button class="btn btn-info">Рассылка на регестрацию нового пользователя</button></a>
                 </li>
             </ul>
        </div>
@endsection
