<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Session;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Utils\ErrorParser;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    private function getItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'modalidad' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'word_count' => 'required|integer|max:255',
            'word_count_pareja' => 'required|integer|max:255',
            'cronoHoras' => 'required|integer|max:255',
            'cronoMinutos' => 'required|integer|max:255',
            'cronoSegundos' => 'required|integer|max:255'
        ]);
        return $validator;
    }

    private function updateItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'modalidad' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'word_count' => 'required|integer|max:255',
            'word_count_pareja' => 'required|integer|max:255',
            'cronoHoras' => 'required|integer|max:255',
            'cronoMinutos' => 'required|integer|max:255',
            'cronoSegundos' => 'required|integer|max:255'
        ]);
        return $validator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        if ($user->rol == 'Estudiante'){
            /*
            $data=Session::join('users_sessions','users_sessions.session_id','=','sessions.id')->where('users_sessions.user_id','=',$user->id)->get();
            $sessions = Session::where('user_id',$user['id'])
            ->orWhere('assisted_by',$user['id'])
            ->get();
            */
            $sessions= $user->sessions;
        }else{
            $sessions = Session::with('users')->get();
        }
        /*
        foreach($sessions as $session){
            $session['user'] = User::where('id',$session['user_id'])->first();
            $session['helper'] = User::where('id',$session['assisted_by'])->first();
        }
        */
        return view('sessions.index', ['sessions' => $sessions], ['current_user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $prevAnswers = $request->get('prevAnswers');
        $idNumbers= User::select('idNumber')->get();
        return view('sessions.create', ['prevAnswers' => $prevAnswers, 'idNumbers' => $idNumbers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $user = auth()->user();
        $data = $request->except('_token');
        if(in_array("word_count_partner",$data)){
            $word_count_partner=$data["word_count_partner"];
        }else{
            $word_count_partner=0;
        }
        $validator = $this->getItemValidator($request);
        $prevAnswers = $data;
        $dataSession = $data;
        $session = new Session;
        $session->format = $dataSession["format"];
        $session->wordCount = intval($dataSession["word_count"])+intval($word_count_partner);
        $session->durationHours =intval($dataSession["cronoHoras"]);+
        $session->durationMinutes =intval($dataSession["cronoMinutos"]);
        $session->durationSeconds =intval($dataSession["cronoSegundos"]);
        $session->created_at=now();
        $partner= User::where('idNumber', $dataSession["idNumber"])->first();
        try {
            DB::beginTransaction();
            $session->save();
            $user->sessions()->attach($session);
            if($user['id']!=$partner['id'])
            {
                $partner->sessions()->attach($session);
                $session->questionnaires()->createMany([
                    [
                    'user_id' => $user['id'],
                    'question_1' => 0,
                    'question_2' => 0,
                    'question_3' => 0,
                    'question_4' => 0,
                    'question_5' => 0,
                    'question_6' => 0,
                    'answered' => false
                    ],
                    [
                    'user_id' => $partner['id'],
                    'question_1' => 0,
                    'question_2' => 0,
                    'question_3' => 0,
                    'question_4' => 0,
                    'question_5' => 0,
                    'question_6' => 0,
                    'answered' => false
                    ]
                ]);
            }
            else{
                $session->questionnaires()->create([
                    'user_id' => $user['id'],
                    'question_1' => 0,
                    'question_2' => 0,
                    'question_3' => 0,
                    'question_4' => 0,
                    'question_5' => 0,
                    'question_6' => 0,
                    'answered' => false
                ]);
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()
                ->route('sessions-register', ['prevAnswers' => $data])
                ->with('error', 'Error al crear el sesión.');
        }
        if ($user->rol == 'Estudiante'){
            $sessions= $user->sessions;
        }else{
            $sessions = Session::with('users')->get();
        }
        return redirect()
        ->route('sessions',['sessions' => $sessions])
        ->with('success', 'Se ha registrado la sesión.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
        $id=$session['id'];
        $participants= $session->users;
        return view('sessions.details', ['readonly' => true, 'prevAnswers' => $session, 'participants' => $participants]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        $idNumbers= User::select('idNumber')->get();
        $participants= $session->users;
        return view('sessions.edit', ['editing' => true, 'prevAnswers' => $session, 'idNumbers' => $idNumbers, 'participants' => $participants]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        $data = $request->except('_token');
        $updatedSession = tap(Session::where('id', '=', $session->id), function ($session) use ($data) {
            return $session->update($data);
        })->first();
        $user = auth()->user();
        if ($user->rol == 'Estudiante'){
            $sessions= $user->sessions;
        }else{
            $sessions = Session::with('users')->get();
        }
        return redirect()
        ->route('sessions',['sessions' => $sessions])
        ->with('success', 'Se ha modificado la sesión.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
