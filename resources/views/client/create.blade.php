@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Создать нового клиента</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="last_name">Фамилия</label>
                                <input type="text" name="last_name" id="full_name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="first_name">Имя</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="patronymic">Отчество</label>
                                <input type="text" name="patronymic" id="patronymic" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="birthday">Дата рождения</label>
                                <input type="date" name="birthday" id="birthday" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Номер телефона</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">e-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="school">Место учебы</label>
                                <input type="text" name="school" id="school" class="form-control"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
