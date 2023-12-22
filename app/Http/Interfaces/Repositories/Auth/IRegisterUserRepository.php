<?php

namespace App\Http\Interfaces\Repositories\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IRegisterUserRepository
{
    public function register(Request $request): JsonResponse;
}
