<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use App\Rules\PasswordValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'email:rfc,dns',
                'regex:/^[\w\._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:10',
                new PasswordValidation()
            ]
        ],[
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.max' => 'The password must not exceed 10 characters.',
        ]);

        $role = $request->email === 'admin@gmail.com' ? 'admin' : 'student';

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $role
            ]);
            return ResponseHelper::success("User registered successfully!", $user, 201);
        } catch (\Exception $e) {
            return ResponseHelper::error("Registration failed!", $e->getMessage(), 400);
        }
    }
}
