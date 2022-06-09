<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,
                        BookController,
                        PeminjamanController,
                        PenerbitController,
                        RakController,
                        PengembalianController,
                        AnggotaController,
                        RoleController,
                        UserController,
                        };
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('books',BookController::class);
Route::resource('anggotas',AnggotaController::class);
Route::resource('peminjaman',PeminjamanController::class);
Route::resource('pengembalian',PengembalianController::class);
Route::resource('penerbit',PenerbitController::class);
Route::resource('raks',RakController::class);
Route::resource('roles',RoleController::class);
Route::resource('users',userController::class);







