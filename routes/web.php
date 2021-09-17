<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('auth.login');
});
Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group (function(){
    Route::get('/courses','App\Http\Controllers\admincoursecontrol@index');
    Route::get('upload','App\Http\Controllers\createController@insert');
Route::post('upload','App\Http\Controllers\createController@create');


Route::get('watch','App\Http\Controllers\advideoController@show')->name('watch');

    
    Route::get('/admin',function(){
        return view('admin');
    })->name('admin');
});
Route::get('/course','App\Http\Controllers\coursecontrol@index');


Route::get('video','App\Http\Controllers\videoController@show')->name('video');



