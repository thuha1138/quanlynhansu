<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;

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
    return view('frontend.include.login');
});
Route::get('/login', function () {
    session()->flush();
    return view('frontend.include.login');
})->name('dangxuat');
Route::get('check-login', [NhanVienController::class, 'checkLogin'])->name('check.login');
Route::get('cham-cong/{id}', [NhanVienController::class, 'chamcong'])->name('chamcong');
Route::get('checkin/{id}', [NhanVienController::class, 'chamCongVao'])->name('check.chamCongVao');
Route::get('checkout/{id}', [NhanVienController::class, 'chamCongRa'])->name('check.chamCongRa');
Route::get('ticket/{id}', [NhanVienController::class, 'ticket'])->name('ticket');
Route::get('createticket', [NhanVienController::class, 'createticket'])->name('createticket');
Route::get('createticket/{id}/{maticket}', [NhanVienController::class, 'deleteticket'])->name('deleteticket');
Route::get('updateticket', [NhanVienController::class, 'updateticket'])->name('updateticket');
