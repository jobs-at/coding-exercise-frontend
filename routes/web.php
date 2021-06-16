<?php

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

Route::get('/', 'JobController@index')->name('jobs');;

Route::get('/jobs/{job}', 'JobController@getJobDetail')->name('job-detail');

Route::get('/job/create', 'JobController@create')->name('job-create')->middleware(['auth','auth.admin']);
Route::post('/job/create', 'JobController@store')->name('job-store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
