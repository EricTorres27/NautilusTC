<?php
//Routes for Session
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


Route::get('/register', [SessionController::class, 'create'])
     ->name('-register')
     ->middleware('can:registerSession');

Route::post('/register', [SessionController::class, 'store'])
 ->name('-register-save')
 ->middleware('can:registerSession');

Route::get('/{session}/show', [SessionController::class, 'show'])
     ->name('-show')
     ->middleware('can:consultSession');

Route::get('/', [SessionController::class, 'index'])
    ->name('')
    ->middleware('can:consultSessions');

