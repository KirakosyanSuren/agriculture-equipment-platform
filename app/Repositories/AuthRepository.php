<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    public function login(array $data): bool
    {
        return Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }
}
