<?php

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Repositories\IRegisterUserRepository;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserRepository implements IRegisterUserRepository
{
    public function register(Request $request): Response
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return response()->noContent();
    }
}
