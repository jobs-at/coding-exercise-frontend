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

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;

Route::get('/', [JobController::class, 'index']);
Route::get('/authenticate', fn() => view('authenticate'));
Route::get('/jobs', fn () => view('new_job'));
Route::get('/companies', [CompanyController::class, 'index']);

Route::post('/jobs', [JobController::class, 'store']);
