<?php

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
/*
Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('login');
*/

Route::redirect('/', '/login');


Route::get('home',function(){
    return view('home');
})->middleware('auth')->name('home');

Route::name('users')
    ->prefix('users')
    ->namespace('users')
    ->middleware('auth')
    ->group(__DIR__ . '/web/users.php');

Route::name('sessions')
    ->prefix('sessions')
    ->namespace('sessions')
    ->middleware('auth')
    ->group(__DIR__ . '/web/session.php');

Route::name('questionnaires')
    ->prefix('questionnaires')
    ->namespace('questionnaires')
    ->middleware('auth')
    ->group(__DIR__ . '/web/questionnaires.php');