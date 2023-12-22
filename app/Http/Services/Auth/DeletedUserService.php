<?php

namespace App\Http\Services\Auth;

use App\Http\Interfaces\Repositories\Auth\IDeletedUserRepository;
use App\Http\Interfaces\Services\Auth\IDeletedUserService;
use Illuminate\Http\Request;

class DeletedUserService implements IDeletedUserService
{
    public function __construct(
        private readonly  IDeletedUserRepository $userRepository
    )
    {
    }

    public function deleteUser(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->userRepository->deleteUser($request);
    }
}
