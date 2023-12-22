<?php

namespace App\Http\Interfaces\Services\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface INewPasswordService
{
    public function newPass(Request $request): JsonResponse;
}
