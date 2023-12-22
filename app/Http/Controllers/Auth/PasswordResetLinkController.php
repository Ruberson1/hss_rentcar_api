<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Auth\IPasswordResetLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    public function __construct(
        private readonly IPasswordResetLinkService $passwordResetLinkService
    ){}


    /**
     * Handle an incoming password reset link request.
     *
     */
    public function resetPass(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        return $this->passwordResetLinkService->resetPass($request);

    }
}
