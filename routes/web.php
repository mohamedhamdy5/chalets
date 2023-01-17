<?php

use App\Http\Controllers\ChaletsController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\Controllers\ChaletsController@index')->name('home');


Route::resource('chalet',ChaletsController::class);
Route::resource('season',SeasonsController::class);
Route::get('/prices', function () {
    return view('prices');
});
