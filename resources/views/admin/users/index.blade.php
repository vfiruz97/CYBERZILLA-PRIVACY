@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin.users.includes.create.error_messages')
    <div class="row justify-content-md-end">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Создать</a>
    </div>
    <h1 class="text-center">Список пользователей</h1>
    <div class="row justify-content-md-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Город</th>
                    <th>Роль</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paginator as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullName }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->city->name }}</td>
                    <td><code>{{ $item->role->slug }}</code></td>
                    <td class="text-center">
                        <a href="{{ route('admin.user.show', $item->id) }}" title="Просмотр">
                            <img src="https://img.icons8.com/cute-clipart/64/000000/month-view.png" alt="view" width="30">
                        </a>
                        <a href="{{ route('admin.user.edit', $item->id) }}" title="Редактировать">
                            <img src="https://img.icons8.com/nolan/64/000000/edit-property.png" alt="edit" width="30">
                        </a>
                        <form method="POST" action="{{ route('admin.user.destroy', $item->id)  }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">D</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($paginator->total() > $paginator->count())
            {{ $paginator->links() }}
        @endif
    </div>
</div>
@endsection
