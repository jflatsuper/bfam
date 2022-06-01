<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('addcomment','App\Http\Controllers\commentcontroller@comment')->name('addcomment');
Route::get('add','App\Http\Controllers\admincoursecontrol@add')->name('add');
Route::get('settings','App\Http\Controllers\adsettingsController@show1')->name('settings');
Route::get('/changenumber','App\Http\Controllers\adsettingsController@show1')->name('/changenumber');
Route::get('/changeprofilepicture','App\Http\Controllers\adsettingsController@show2')->name('/changeprofilepicture');
Route::get('/changedetails','App\Http\Controllers\adsettingsController@show3')->name('/changedetails');

Route::post('changeno','App\Http\Controllers\adsettingsController@show4')->name('changeno');
Route::post('changedetails','App\Http\Controllers\adsettingsController@show5')->name('changedetails');
Route::post('changepic','App\Http\Controllers\adsettingsController@show6')->name('changepic');
Route::get('delete','App\Http\Controllers\admincoursecontrol@delete')->name('delete');


    Route::get('/admin',
    [App\Http\Controllers\admincontroller::class, 'index']) ->name('admin');
});
Route::get('/course','App\Http\Controllers\coursecontrol@index');



Route::get('watcher','App\Http\Controllers\videocontroller@show')->name('watcher');
Route::post('addcommentuser','App\Http\Controllers\commentusercontroller@comment')->name('addcommentuser');
Route::get('deletes','App\Http\Controllers\coursecontrol@delete')->name('deletes');
Route::get('added','App\Http\Controllers\coursecontrol@add')->name('added');

Route::get('setting','App\Http\Controllers\settingsController@show11')->name('setting');
Route::get('/changenumbers','App\Http\Controllers\settingsController@show11')->name('/changenumbers');
Route::get('/changeprofilepic','App\Http\Controllers\settingsController@show22')->name('/changeprofilepic');
Route::get('/changedetail','App\Http\Controllers\settingsController@show33')->name('/changedetail');

Route::post('changeno1','App\Http\Controllers\settingsController@show44')->name('changeno1');
Route::post('changedetails1','App\Http\Controllers\settingsController@show55')->name('changedetails1');
Route::post('changepic1','App\Http\Controllers\settingsController@show66')->name('changepic1');
