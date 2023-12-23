<?php

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Repositories\Auth\IRegisterUserRepository;
use App\Models\Permission;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserRepository implements IRegisterUserRepository
{
    public function register(Request $request): JsonResponse
    {
        try {
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
            return response()->json([
                'message' => 'Usuário criado com sucesso.'
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'error' => 'Falha ao tentar criar o usuário.',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function update(Request $request): JsonResponse
    {
        $userId = $request->id;

        try {
            $user = User::find($userId);
            $user->update($request->only([
                'name', 'email'
            ]));
            $permission = Permission::find($request->permission);
            $user->permissions()->sync($permission);
            return response()->json($user);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
    }

    public function userList(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }
}
