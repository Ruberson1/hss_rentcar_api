<?php

namespace App\Http\Interfaces\Services\Auth;

use Illuminate\Http\Request;

interface IDeletedUserService
{
    public function deleteUser(Request $request): \Illuminate\Http\JsonResponse;
}
