<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        if(isset($input['consent_information'])){
            $input['consent_information'] = 1;
        } else{
                $input['consent_information'] = 0;
        }
        if(isset($input['consent_practices'])){
            $input['consent_practices'] = 1;
        } else{
            $input['consent_practices'] = 0;
        }
        Validator::make($input, [
            'name' => ['required', 'string','min:10','max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'idNumber' => [
                'required',
                'string',
                'max:9',
                Rule::unique(User::class),
            ],
            'consent_information' => 'required',
            'consent_practices' => 'required',
            'password' => $this->passwordRules(),
            'password_confirmation' => ['same:password'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'idNumber' => $input['idNumber'],
            'consent_information' => $input['consent_information'],
            'consent_practices' => $input['consent_practices'],
            'rol' => 'Estudiante'
        ]);
    }
}
