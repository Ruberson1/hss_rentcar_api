<?php

namespace App\Http\Interfaces\Repositories\Auth;

use Illuminate\Http\Request;

interface IDeletedUserRepository
{
    public function deleteUser(Request $request): \Illuminate\Http\JsonResponse;
}
