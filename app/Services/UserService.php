<?php

namespace App\Services;

use App\Mail\ActivationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    public function register($data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'activation_code' => Str::random(32),
            'role' => $data['role']
        ]);

        // Send activation email
        Mail::to($user->email)->send(new ActivationEmail($user));

        return $user;
    
    }
}
