<?php

use App\Date;
use App\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Event::destroy(2);
    // return dd(Date::all());
    // return view('welcome');
    return view('index');
});

Route::post('/save/event', 'EventController@saveEvent')->name('save.event');
Route::post('/list/events', 'EventController@listEvents')->name('list.event');
