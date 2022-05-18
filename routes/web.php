<?php

use App\Http\Controllers\AuthViewController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/login', [AuthViewController::class, 'signIn'])->name('login');
Route::get('/register', [AuthViewController::class, 'studentRegistration'])->name('register');
Route::get('/logout', [AuthViewController::class, 'signOut'])->name('logout');
