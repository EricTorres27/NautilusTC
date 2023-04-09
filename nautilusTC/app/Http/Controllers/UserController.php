<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    private function getItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'idNumber' => ['required', Rule::unique('users')->ignore($request->id)],
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'consent_information' => 'required|boolean',
            'consent_practices' => 'required|boolean',
            'roles' => 'required|string',

        ]);
        return $validator;
    }

    private function updateItemValidator($request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'idNumber' => ['required', Rule::unique('users')->ignore($request->id)],
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'consent_information' => 'required|boolean',
            'consent_practices' => 'required|boolean',
            'roles' => 'required|string',
        ]);
        return $validator;
    }

    //The function index is to show all users that exists on the database
    public function index()
    {
        //
        $users = User::with(
            'roles:name'
        )->get();
        return view('users.index', ['users' => $users]);
    }

    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //The function create is for show the interface with the form for create a new user, get all roles and clients
     // of the database and send the information to the form .
     public function create(Request $request)
     {
         $prevAnswers = $request->get('prevAnswers');
         return view('users.create', ['prevAnswers' => $prevAnswers]);
     }

     // The function store receive a request with all the information of a new user, then validate the information
     // with the rules of the function 'getItemValidator', make hash to the password,
     // and finally insert the information in users and user_roles.
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validator = $this->getItemValidator($request);

        $prevAnswers = $data;
        
        if ($validator->fails()) {
            return redirect()
                ->route('users-register',['prevAnswers'=>$prevAnswers])
                ->with('error', ErrorParser::parseValidatorError($validator));
        }

        $dataUser = $data;
        $valRole = $dataUser["roles"];
        unset($dataUser["roles"]);
        $password = implode($this->generatePassword());
        $pin =  sprintf("%04d", mt_rand(1, 9999));
        $userPassword= Hash::make( $password);

        $user = new User;
        $user->name = $dataUser["name"];
        $user->idNumber = $dataUser["idNumber"];
        $user->email = $dataUser["email"];
        $user->password =  $userPassword;
        $user->consent_information = $dataUser["consent_information"];
        $user->consent_practices = $dataUser["consent_practices"];

        try {
            $user->save();
            $user->roles()->attach($valRole);
        } catch(\Exception $e) {
            //dd($e);
            return redirect()
                ->route('users-register', ['prevAnswers' => $data])
                ->with('error', 'Error al crear el usuario.');
        }

        return redirect()
            ->route('users')
            ->with('success', 'Se ha registrado el usuario.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $id=$user['id'];
        $rols=UsersRoles::firstWhere('user_id', $id);

        return view('user.details', ['readonly' => true, 'prevAnswers' => $user, 'userRole' =>$user->roles->first() ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
         //
         $id=$user['id'];
         $rols=UsersRoles::firstWhere('user_id', $id);
 
         return view('user.edit', ['editing' => true, 'prevAnswers' => $user, 'userRole' => $user->roles->first() ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $request->except('_token');
        $validator = $this->updateItemValidator($request);

        $prevAnswers = $data;

        if ($validator->fails()) {

            return redirect()
                ->route('users-edit',[$user, 'prevAnswers'=>$prevAnswers])
                ->with('error', ErrorParser::parseValidatorError($validator));
        }

        $valRole=$data["roles"];
        unset($data["roles"]);

        $array = array(
            "role_id" => $valRole,
            "user_id" => $user['id'],
        );
        
        UsersRoles::where('user_id', '=', $user["id"])
            ->update(['role_id' => $array["role_id"]]);

        $updatedUser = tap(User::where('id', '=', $user->id), function ($user) use ($data) {
            return $user->update($data);
        })->first();

        return redirect()
        ->route('users-show', ['user' => $user,'prevAnswers' => $data])
        ->with('success', 'Se ha modificado el usuario.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try{
            User::destroy($user->id);
        } catch (\Exception $e) {
            return back()
                ->with(
                    'error', 'El usuario tiene dependencias,
                    por integridad de la información no se puede eliminar.'
                );
        }
        return redirect()
            ->route('users')
            ->with('success', 'Se ha eliminado el usuario.');
    }
}
