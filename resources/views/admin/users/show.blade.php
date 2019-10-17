@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.users.includes.create.error_messages')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Основные данные</a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="surname">Фамилия</label>
                                            <input name='surname' value="{{ $item->name }}"
                                                   id='surname'
                                                   type="text"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Имя</label>
                                            <input name='name' value="{{ $item->name }}"
                                                   id='name'
                                                   type="text"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="age">Возраст</label>
                                            <input name='age' value="{{ $item->age }}"
                                                   id='age'
                                                   type="number"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city_id">Любимый город</label>
                                            <input name='city_id' value="{{ $item->city->name }}"
                                                   id='city_id'
                                                   type="text"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="about">О себе</label>
                                    <textarea name='about'
                                              id='about'
                                              class="form-control"
                                              readonly
                                              rows="3">{{ $item->about }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input name='email' value="{{ $item->email }}"
                                                   id='email'
                                                   type="email"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Роль</label>
                                            <input name='role' value="{{ $item->role->slug }}"
                                                   id='role'
                                                   type="text"
                                                   class="form-control"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.user.index')}}" class="btn btn-info btn-block">Назад</a>
                        <hr>
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input name='id' value="{{ $item->id }}"
                                   id='id'
                                   type="text"
                                   class="form-control"
                                   disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="created_at">Создано</label>
                            <input name='created_at' value="{{ $item->created_at }}"
                                   id='created_at'
                                   type="text"
                                   class="form-control"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label for="updated_at">Изминено</label>
                            <input name='updated_at' value="{{ $item->updated_at }}"
                                   id='updated_at'
                                   type="text"
                                   class="form-control"
                                   disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="deleted_at">Удалино</label>
                            <input name='deleted_at' value="{{ $item->deleted_at }}"
                                   id='deleted_at'
                                   type="text"
                                   class="form-control"
                                   disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
