@extends('layouts.default')

@section('title', 'Все Категории')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата Создания</th>
            <th scope="col" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at }}</td>
                <td style="text-align: center">
                    @can('category edit')
                        <a href="{{ route('category.edit', $category->id) }}"><button class="btn btn-primary">Редактировать</button></a>
                    @endcan
                    @can('category delete')
                            <form action="{{ route('category.delete', $category) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mb-5">
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
