<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Auth::routes();
//Method Get untuk menampilkan data
//Method Post untuk Menambahkan Data
//Method Delete untuk menghapus data
//Method Patch / Put untuk Mengupdate data
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/create', [DashboardController::class, 'create']);
Route::get('/dashboard/{dashboard}', [DashboardController::class, 'show']);
Route::post('/dashboard', [DashboardController::class, 'store']);
Route::delete('/dashboard/{dashboard}', [DashboardController::class, 'destroy']);
Route::get('/dashboard/{dashboard}/edit', [DashboardController::class, 'edit']);
Route::patch('/dashboard/{dashboard}', [DashboardController::class, 'update']);
