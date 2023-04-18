<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\User;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $user = auth()->user();
        if ($user->rol == 'Estudiante'){
            $questionnaires= $user->questionnaires;
        }else{
            $questionnaires = Questionnaire::with('user')->get();
        }
        return view('questionnaires.index', ['questionnaires' => $questionnaires], ['current_user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        //
        return view('questionnaires.details', ['editing' => true, 'prevAnswers' => $questionnaire]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
        $format= $questionnaire->session->format;
        return view('questionnaires.edit', ['editing' => true, 'prevAnswers' => $questionnaire, 'format' => $format]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        $data = $request->except('_token');
        $updatedQuestionnaire = tap(Questionnaire::where('id', '=', $questionnaire->id), function ($questionnaire) use ($data) {
            return $questionnaire->update($data);
        })->first();
        return redirect()
        ->route('questionnaires')
        ->with('success', 'Se ha modificado el cuestionario.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
