<?php
//Routes for User
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'create'])
    ->name('-register')
    ->middleware('can:registerUser');

Route::post('/register', [UserController::class, 'store'])
->name('-register-save')
->middleware('can:registerUser');

Route::get('/{user}/edit', [UserController::class, 'edit'])
    ->name('-edit')
    ->middleware('can:registerUser');

    Route::post('/{user}/edit', [UserController::class, 'update'])
    ->name('-update')
    ->middleware('can:registerUser');


    
Route::get('/', [UserController::class, 'index'])
    ->name('')
    ->middleware('can:consultUsers');

