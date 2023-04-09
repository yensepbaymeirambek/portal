<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [ScheduleController::class, 'getSchedule']);
Route::get('/group/{group}/add/client', [GroupController::class, 'showAddClient'])->name('show.add.client');
Route::post('/group/{group}/add/client', [GroupController::class, 'addClient'])->name('group.add.client');
Route::delete('/group/{group}/remove/client/{client}', [GroupController::class, 'removeClient'])->name('group.remove.client');
Route::resource('/schedules', ScheduleController::class);
Route::resource('/client', ClientController::class);
Route::resource('/group', GroupController::class);

