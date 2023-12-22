<?php

namespace App\Http\Interfaces\Services\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IPasswordResetLinkService
{
    public function resetPass(Request $request): JsonResponse;
}
