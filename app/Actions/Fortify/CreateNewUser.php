<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\NameValidation;
use App\Rules\PasswordValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:100', new NameValidation()],
            'email' => ['required', 'string', 'email', 'max:255', 
                        'unique:users,email', 'email:rfc,dns',
                        'regex:/^[\w\._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/'],
            'password' => ['required','string','min:6','max:10',new PasswordValidation()],
        ])->after(function ($validator) use ($input) {
            if (isset($input['password']) && isset($input['password_confirmation']) && $input['password'] !== $input['password_confirmation']) {
                $validator->errors()->add('password_confirmation', 'The password confirmation does not match.');
            }
        })->validate();

        return User::create([
            'user_id' => "U" . now()->format('y') . now()->format('m') . now()->format('d') . rand(1000, 9999),
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
