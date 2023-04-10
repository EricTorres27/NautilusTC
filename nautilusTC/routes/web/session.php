<?php
//Routes for Session
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


// Route::get('/register', [SessionController::class, 'create'])
//     ->name('-register')
//     ->middleware('can:registerUser');

// Route::post('/register', [SessionController::class, 'store'])
// ->name('-register-save')
// ->middleware('can:registerUser');

// Route::get('/{user}/edit', [SessionController::class, 'edit'])
//     ->name('-edit')
//     ->middleware('can:registerUser');

//     Route::post('/{user}/edit', [SessionController::class, 'update'])
//     ->name('-update')
//     ->middleware('can:registerUser');


    
Route::get('/', [SessionController::class, 'index'])
    ->name('')
    ->middleware('can:consultUsers');

