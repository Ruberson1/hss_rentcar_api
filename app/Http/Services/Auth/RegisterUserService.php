<?php

namespace App\Http\Services\Auth;

use App\Http\Interfaces\Repositories\Auth\IRegisterUserRepository;
use App\Http\Interfaces\Services\Auth\IRegisterUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterUserService implements IRegisterUserService
{
    public function __construct(
        private readonly IRegisterUserRepository $userRepository
    ){}


    public function register(Request $request): JsonResponse
    {
        return $this->userRepository->register($request);
    }
}
