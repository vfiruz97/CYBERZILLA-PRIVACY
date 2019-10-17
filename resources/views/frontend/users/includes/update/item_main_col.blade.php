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
                                <input name='surname' value="{{ old('surname', $item->surname) }}"
                                       id='surname'
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input name='name' value="{{ old('name', $item->name) }}"
                                       id='name'
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Возраст</label>
                                <input name='age' value="{{ old('age', $item->age) }}"
                                       id='age'
                                       type="number"
                                       class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city_id">Любимый город</label>
                                <select name='city_id'
                                        id='city_id'
                                        class="form-control"
                                        placeholder='Выберите любимый город'
                                        required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}"  @if($city->id == $item->city_id) selected @endif>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="about">О себе</label>
                        <textarea name='about'
                                  id='about'
                                  class="form-control"
                                  rows="3">{{ old('about', $item->about) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input name='email' value="{{ old('email', $item->email) }}"
                                       id='email'
                                       type="email"
                                       class="form-control"
                                       minlength="3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input name='password' value=""
                                       id='password'
                                       type="password"
                                       class="form-control"
                                       minlength="3">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
