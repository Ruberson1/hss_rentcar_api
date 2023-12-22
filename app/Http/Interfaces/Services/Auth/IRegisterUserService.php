<?php

namespace App\Http\Interfaces\Services\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IRegisterUserService
{
    public function register(Request $request): JsonResponse;
}
