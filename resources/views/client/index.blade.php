@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Клиенты
                        </div>
                        <div>
                            <a class="" href="{{ route('client.create') }}">Создать</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>ФИО</th>
                                <th>e-mail</th>
                                <th>Номер телефона</th>
                                <th>Адрес</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td><a href="{{route('client.show', ['client' => $client])}}">{{$client->id}}</a></td>
                                    <td> {{$client->last_name}} {{$client->first_name}} {{$client->patronymic}}</td>
                                    <td> {{$client->email}} </td>
                                    <td> {{$client->phone}} </td>
                                    <td> {{$client->address}} </td>
                                    <td>
                                        <form method="post" action="{{route('client.destroy', $client)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" > <i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
