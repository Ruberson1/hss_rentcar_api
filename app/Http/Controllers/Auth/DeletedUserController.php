<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Auth\IDeletedUserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeletedUserController extends Controller
{
    public function __construct(
        private readonly IDeletedUserService $userService
    ){}

    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {

    }
}
