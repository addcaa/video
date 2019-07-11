<?php

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
    return view('welcome');
});

Route::get('video/index','Video\VideoController@index');
Route::get('video/details','Video\VideoController@details');

Route::get('weather/weather','Video\VideoController@weather');
Route::get('/cron','Cron\CronController@cron');