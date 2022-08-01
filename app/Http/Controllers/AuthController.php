<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\HttpHandler;
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
        if ($user = $this->repository->register($request->all())) {
            return HttpHandler::successResponse([
                "email" => $user->email,
                'message' => 'Registration done successfully.'
            ],201);
        }

        return HttpHandler::errorMessage(Constants::SOMETHING_WENT_WRONG);
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
