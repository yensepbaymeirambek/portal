@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Мои группы
                        </div>
                        <div>
                            <a class="" href="{{ route('group.create') }}">Создать</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Название</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td><a href="{{route('group.show', ['group' => $group])}}">{{$group->id}}</a></td>
                                    <td> {{$group->name}} </td>
                                    <td>
                                        <form method="post" action="{{route('group.destroy', $group)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $groups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
