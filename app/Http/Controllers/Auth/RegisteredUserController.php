<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Auth\IRegisterUserService;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{

    public function __construct(
       private readonly IRegisterUserService $userService
    ){}


    /**
     * Handle an incoming registration request.
     *
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'cpf' => ['required', 'string','max:11', 'unique:'.User::class],
            'password' => ['required'],
        ]);
        return $this->userService->register($request);
    }
}
