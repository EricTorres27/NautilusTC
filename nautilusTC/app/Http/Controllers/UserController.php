<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'consent_practices' => 'required|string',
            'rol' => 'required|string',

        ]);
        return $validator;
    }

    //The function index is to show all users that exists on the database
    public function index()
    {
        $users = User::all();
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
        // dd($data);
        $prevAnswers = $data;
        $dataUser = $data;
        $userPassword= Hash::make($data['password']);
        if(isset($data['consent_information'])){
            $dataUser['consent_information'] = 1;
        } else{
                $dataUser['consent_information'] = 0;
        }
        if(isset($data['consent_practices'])){
            $dataUser['consent_practices'] = 1;
        } else{
            $dataUser['consent_practices'] = 0;
        }
        $user = new User;
        $user->name = $dataUser["name"];
        $user->idNumber = $dataUser["idNumber"];
        $user->email = $dataUser["email"];
        $user->password =  $userPassword;
        $user->consent_information = $dataUser["consent_information"];
        $user->consent_practices = $dataUser["consent_practices"];
        $user->rol = $dataUser["rol"];

        try {
            $user->save();
        } catch(\Exception $e) {
            dd($e);
            return redirect()
                ->route('users-register', ['prevAnswers' => $data])
                ->with('error', 'Error al crear el usuario.');
        }

        return redirect()
            ->route('users')
            ->with('success', 'Se ha registrado el usuario.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
         return view('users.edit', ['editing' => true, 'prevAnswers' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $request->except('_token');
        if(isset($data['consent_information'])){
            $data['consent_information'] = 1;
        } else{
                $data['consent_information'] = 0;
        }
        if(isset($data['consent_practices'])){
            $data['consent_practices'] = 1;
        } else{
            $data['consent_practices'] = 0;
        }
        $updatedUser = tap(User::where('id', '=', $user->id), function ($user) use ($data) {
            return $user->update($data);
        })->first();
        $users = User::all();
        return redirect()
        ->route('users',['user' => $users])
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
