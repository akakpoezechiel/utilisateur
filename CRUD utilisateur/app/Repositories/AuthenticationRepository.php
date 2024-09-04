<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordEmail;

class AuthenticationRepository implements AuthenticationInterface
{
    public function login(array $data)
    {
        return Auth::attempt($data);
    }

    public function sendPassword($email, $name){
        
        $password = str()->random(8);
        session()->put('email', $email);

        Mail::to($email)->send(new PasswordEmail($name, $password));

        return $password;
    }
}