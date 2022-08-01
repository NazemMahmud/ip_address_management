<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(protected AuthRepositoryInterface $repository)
    {
    }

    /**
     * Register a new user
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function registration(RegistrationRequest $request): JsonResponse
    {
       // TODO
    }


    public function login()
    {
        // TODO
    }



    public function refresh()
    {
        // TODO
    }


    public function logout()
    {
        // TODO
    }

}
