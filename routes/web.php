<?php

use App\Http\Controllers\DataUserController;
use Dflydev\DotAccessData\Data;
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

Route::get('/home', [DataUserController::class, 'index'])->name('home');

Route::post('user-import', [DataUserController::class, 'import'])->name('user.import');
Route::post('/data-by-nop', [DataUserController::class, 'getDataByNop']);
