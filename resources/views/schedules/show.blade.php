@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Schedule</div>
                    <div class="card-body">
                        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="group_id">Group:</label>
                                <select name="group_id" id="group_id" class="form-control">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}" @if ($schedule->group_id == $group->id) selected @endif>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="day">Day:</label>
                                <input type="text" name="day" id="day" class="form-control" value="{{ $schedule->day }}">
                            </div>

                            <div class="form-group">
                                <label for="start_time">Start Time:</label>
                                <input type="text" name="start_time" id="start_time" class="form-control" value="{{ $schedule->start_time }}">
                            </div>

                            <div class="form-group">
                                <label for="end_time">End Time:</label>
                                <input type="text" name="end_time" id="end_time" class="form-control" value="{{ $schedule->end_time }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


