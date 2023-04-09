<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    private function getItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'format' => 'required|string|max:255',
            'idNumber' => 'required|string|max:255',
            'idNumber2' => 'required|string|max:255',
            'interaction1' => 'required|integer|max:255',
            'interaction2' => 'required|integer|max:255',
            'durationH' => 'required|integer|max:255',
            'durationM' => 'required|integer|max:255',
            'durationS' => 'required|integer|max:255'
        ]);
        return $validator;
    }

    private function updateItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'format' => 'required|string|max:255',
            'idNumber' => 'required|string|max:255',
            'interaction1' => 'required|integer|max:255',
            'interaction2' => 'required|integer|max:255',
            'durationH' => 'required|integer|max:255',
            'durationM' => 'required|integer|max:255',
            'durationS' => 'required|integer|max:255'
        ]);
        return $validator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $sessions = Session::all();
        return view('session.index', ['sessions' => $sessions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prevAnswers = $request->get('prevAnswers');
        $idNumbers = sessions::pluck('idNumber');
        return view('session.create', ['roles'=>$roles, 'prevAnswers' => $prevAnswers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $validator = $this->getItemValidator($request);

        $prevAnswers = $data;
        
        if ($validator->fails()) {
            return redirect()
                ->route('sessions-register',['prevAnswers'=>$prevAnswers])
                ->with('error', ErrorParser::parseValidatorError($validator));
        }

        $dataSession = $data;
        $user= User::where('idNumber', $dataSession["idNumber"])->first();
        $user2= User::where('idNumber2', $dataSession["idNumber2"])->first();
        $session = new session;
        $session->format = $dataSession["name"];
        $session->wordCount = $dataSession["idNumber"];
        $session->duration = int($dataSession["durationS"])+int($dataSession["durationM"])*60+int($dataSession["durationH"])*3600;
        try {
            $session->save();
            $user->sessions()->attach($user['id']);
            $user2->sessions()->attach($user2['id']);
        } catch(\Exception $e) {
            //dd($e);
            return redirect()
                ->route('sessions-register', ['prevAnswers' => $data])
                ->with('error', 'Error al crear el sesion.');
        }

        return redirect()
            ->route('sessions')
            ->with('success', 'Se ha registrado la sesion.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
        $id=$session['id'];
        $rols=UsersRoles::firstWhere('user_id', $id);

        return view('user.details', ['readonly' => true, 'prevAnswers' => $user, 'userRole' =>$user->roles->first() ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
