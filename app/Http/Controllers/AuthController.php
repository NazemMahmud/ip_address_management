<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\HttpHandler;
use App\Http\Requests\Auth\LoginRequest;
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

    /**
     * User Login
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $requestData = $request->all();

        if (!$token = auth()->attempt($requestData)) {
            return HttpHandler::errorMessage('Invalid email or password', 422);
        }

        return response()->json([
            'data' => $this->respondWithToken($token)->original,
            'status' => Constants::SUCCESS
        ], 200);
    }

    /**
     * Get the token array structure for login.
     * @param  string $token
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
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
