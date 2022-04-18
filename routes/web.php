<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginregisterController;
use \App\Http\Controllers\ChargerController;


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

Route::get('/contactus',[ContactController::class,'index'])->name('contactus');
Route::get('/companyinfo',[InfoController::class,'index'])->name('companyinfo');
Route::get('/loginregister',[LoginregisterController::class,'index'])->name('loginregister');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [ReservationController::class, 'show'])->name('history');

// プレミア会員用のルーティング
Route::group(['middleware' => ['auth', 'can:premier-only']], function () {
    Route::get('/premier', 'HomeController@premier_index')->name('premier');
});

Route::prefix('reservation')->middleware('auth')->group(function(){
    Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation_list', [ReservationController::class, 'reservation_list'])->name('reservation.reservation_list');
    Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
    });

Route::get('charger_view', [ChargerController::class, 'index'])->name('charger.index');
Route::get('charger/list', [ChargerController::class, 'list'])->name('charger.list');