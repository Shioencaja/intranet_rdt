<?php

namespace App\Actions\Fortify;

use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

            'surnames' => ['required', 'string', 'max:50'],
            'date_birth' => ['required'],
            'gender' => ['required', 'string', 'max:3'],
            'address' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15','unique:people'],
            'business_type' => ['required', 'string', 'max:100'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);

        $person = new Person();
        $person->user_id = $user->id;
        $person->surnames = $input["surnames"];
        $person->date_birth = $input["date_birth"];
        $person->gender = $input["gender"];
        $person->address = $input["address"];
        $person->country = $input["country"];
        $person->district = $input["district"];
        $person->phone = $input["phone"];
        $person->business_type = $input["business_type"];
        $person->save();
        return $user;
    }

}
