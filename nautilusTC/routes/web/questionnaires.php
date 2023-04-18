<?php
//Routes for Questionnaries
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;

Route::get('/{questionnaire}/edit', [QuestionnaireController::class, 'edit'])
     ->name('-edit')
     ->middleware('can:editQuestionnaires');

Route::post('/{questionnaire}/edit', [QuestionnaireController::class, 'update'])
     ->name('-update')
     ->middleware('can:editQuestionnaires');

Route::get('/{questionnaire}/show', [QuestionnaireController::class, 'show'])
     ->name('-show')
     ->middleware('can:consultQuestionnaires');

Route::get('/', [QuestionnaireController::class, 'index'])
    ->name('')
    ->middleware('can:consultQuestionnaires');