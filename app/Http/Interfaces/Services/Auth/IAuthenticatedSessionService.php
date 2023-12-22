<?php

namespace App\Http\Interfaces\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IAuthenticatedSessionService
{
    public function auth(LoginRequest $request): Response;

    public function logout(Request $request): Response;
}
