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
    public function index()
    {
        //
        //
        if($request->has('search')) {
            return $this->search($request);
        }
        $users = User::paginate(15);
        return view('user.index', ['users' => $users, 'search' => false]);
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
         $roles = Role::all();
         return view('user.create', ['roles'=>$roles, 'prevAnswers' => $prevAnswers]);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
