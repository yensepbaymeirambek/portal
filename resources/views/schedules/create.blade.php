@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Schedule</div>
                    <div class="card-body">
                        <form action="{{ route('schedules.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="group_id">Group:</label>
                                <select name="group_id" id="group_id" class="form-control">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="day">Day:</label>
                                <select name="day" id="day" class="form-control">
                                    @foreach(\App\Models\Schedule::ENUM_DAYS as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_time">Начало:</label>
                                <input type="time" name="start_time" id="start_time" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="end_time">Конец:</label>
                                <input type="time" name="end_time" id="end_time" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


