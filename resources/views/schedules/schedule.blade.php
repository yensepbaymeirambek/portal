@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Schedule</div>
                    <div class="card-body">
                        фывфыв
                        <div id="app">
                            <example-component></example-component>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Понедельник</th>
                                <th>Вторник</th>
                                <th>Среда</th>
                                <th>Четверг</th>
                                <th>Пятница</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    @foreach($mondayDate as $monday)
                                        ({{substr($monday->start_time, 0, 5)}}-{{substr($monday->end_time, 0, 5)}})  <span style="font-weight: 600 !important">{{ $monday->group->name }}</span> <br> <hr>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($tuesdayDate as $tuesday)
                                        ({{substr($tuesday->start_time, 0, 5)}}-{{substr($tuesday->end_time, 0, 5)}})  <span style="font-weight: 600 !important">{{ $tuesday->group->name }}</span><br> <hr>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($wednesdayDate as $wednesday)
                                        ({{substr($wednesday->start_time, 0, 5)}}-{{substr($wednesday->end_time, 0, 5)}})  <span style="font-weight: 600 !important">{{$wednesday->group->name}}</span><br> <hr>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($thursdayDate as $thursday)
                                        ({{substr($thursday->start_time, 0, 5)}}-{{substr($thursday->end_time, 0, 5)}})  <span style="font-weight: 600 !important">{{$thursday->group->name}}</span><br> <hr>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($fridayDate as $friday)
                                        ({{substr($friday->start_time, 0, 5)}}-{{substr($friday->end_time, 0, 5)}})  <span style="font-weight: 600 !important">{{$friday->group->name}}</span><br> <hr>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    window.Vue = require('vue');

    const app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!'
        }
    });

</script>
