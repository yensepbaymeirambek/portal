@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Создать новую группу</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('group.store') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name">Название</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
