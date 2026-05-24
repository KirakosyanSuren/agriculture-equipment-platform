<?php

namespace App\Services;

use App\Interfaces\AuthInterface;

class AuthService
{
    public function __construct(
        private AuthInterface $auth_repository
    ){}

    public function login(array $data): bool
    {
        return $this->auth_repository->login($data);
    }
}
