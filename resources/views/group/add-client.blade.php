@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Добавить клиента</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('group.add.client', $group)}}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="clients_id">Выберите клиентов</label>
                                <select class="form-select" id="clients_id" name="clients_id[]" size="10" multiple="multiple" tabindex="1">
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->id}}) {{$client->last_name}} {{$client->first_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-light small">
                                    Для Windows: удерживайте нажатой кнопку управления (ctrl), чтобы выбрать несколько вариантов.
                                </span>
                                <br>
                                <span class="text-light small">
                                    Для Mac: удерживайте нажатой командную кнопку, чтобы выбрать несколько вариантов.
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
