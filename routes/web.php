<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResultController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// プレミア会員用のルーティング
Route::group(['middleware' => ['auth', 'can:premier-only']], function () {
    Route::get('/premier', 'HomeController@premier_index')->name('premier');
});

Route::prefix('reservation')->middleware('auth')->group(function(){
    Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation_list', [ReservationController::class, 'reservation_list'])->name('reservation.reservation_list');
    Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
    });

Route::get('/result', [ResultController::class, 'currentLocation'])->name('result.currentLocation');