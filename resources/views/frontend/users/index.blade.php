@extends('layouts.app')

@section('content')
    <div class="container">
        @include('frontend.users.includes.update.error_messages')
        @if(Auth::check())
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="{{route('user.show', Auth::user()->id)}}" class="btn btn-outline-primary btn-lg" >Мой профиль</a>
                </div>
            </div>
            <br>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Задача</div>

                    <div class="card-body">
                        <ul>
                            <li>Написать панель управления пользователями, с регистрацией и авторизацией + CRUD.</li>
                            <li>В базу данных добавить 100000 записей, каждая запись должна содержать 10 аттрибутов,
                                3 из 10 аттрибутов должны быть в связных таблицах.</li>
                            <li>Все записи вывести списком в панель управления администратора.</li>
                            <li>10 первых записей (по порядку), вывести в панель пользователя (личный кабинет).</li>
                            <li>Обязательно использование Laravel, jquery, bootstrap css</li>
                            <li>Демострацию лучше проводить либо на хостинге, либо через teamviewer на Вашей машине. +</li>
                            <li>Желательно загруженный код в git</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
