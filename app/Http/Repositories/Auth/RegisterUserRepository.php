<?php

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Repositories\Auth\IRegisterUserRepository;
use App\Models\Permission;
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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = Hash::make($request->password);

        $user->save();

        $permission = Permission::find(env('CUSTOMER_PERMISSION', 3));
        $user->permissions()->save($permission);

        event(new Registered($user));

        Auth::login($user);
        return response()->noContent();
    }
}
