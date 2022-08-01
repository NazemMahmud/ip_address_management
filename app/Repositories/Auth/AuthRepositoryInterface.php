<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface {

    // user registration
    public function register(array $data): mixed;
}
