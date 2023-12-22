<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Auth\IAuthenticatedSessionService;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private readonly IAuthenticatedSessionService $authenticatedSessionService
    ){}


    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request): Response
    {
        return $this->authenticatedSessionService->auth($request);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): Response
    {
        return $this->authenticatedSessionService->logout($request);
    }
}
