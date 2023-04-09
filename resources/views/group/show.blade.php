@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Создать новую группу</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('group.update', $group) }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name">Название</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                               value="{{$group->name}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>Клиенты</div>
                                <a class="btn btn-success" href="{{route('show.add.client', $group)}}">+</a>
                            </div>
                            <div class="card-body">
                                @if(isset($clients))
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Название</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>
                                                    <a href="{{route('client.show', ['client' => $client])}}">{{$client->id}}</a>
                                                </td>
                                                <td>{{$client->last_name}} {{$client->first_name}}</td>
                                                <td>
                                                    <form method="post" action="{{route('group.remove.client', ['client' => $client, 'group' => $group])}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
