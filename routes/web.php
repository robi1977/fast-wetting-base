<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('sample', SampleController::class)->middleware('auth');
Route::get('your-list', [SampleController::class, 'your_list'])->middleware('auth');
Route::get('list', [SampleController::class, 'list'])->middleware('auth');
Route::get('search', [SampleController::class, 'search'])->middleware('auth');
Route::post('search-result', [SampleController::class, 'search_result'])->middleware('auth');
