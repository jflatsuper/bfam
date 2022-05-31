<?php

use App\Http\Controllers\AuthViewController;
use App\Http\Controllers\StudentViewController;
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
Route::middleware('auth')->name('student.')->group(function () {
    Route::middleware('role:student')->group(function () {
        Route::get('/',                                                     [StudentViewController::class, 'dashboard'])->name('dashboard');

        Route::get('/exam',                                                  [StudentViewController::class, 'exam'])->name('exam');

         Route::get('/profile',                                              [StudentViewController::class, 'profile'])->name('profile');

        Route::get('/courses',                                               [StudentViewController::class, 'courses'])->name('courses');
        Route::get('/my-courses',                                            [StudentViewController::class, 'myCourses'])->name('my-courses');
        Route::get('/categories/{category_name}',                            [StudentViewController::class, 'categoryCourses'])->name('category-courses');
        Route::get('/course-details/{course_id}',                            [StudentViewController::class, 'courseDetails'])->name('course-details');
        Route::get('/course-preview/{course_id}',                            [StudentViewController::class, 'coursePreview'])->name('course-preview');

    });
});

