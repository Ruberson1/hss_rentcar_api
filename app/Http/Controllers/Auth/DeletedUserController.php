<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Auth\IDeletedUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeletedUserController extends Controller
{
    public function __construct(
        private readonly IDeletedUserService $userService
    ){}

    public function delete(Request $request): JsonResponse
    {
        return $this->userService->deleteUser($request);
    }
}
