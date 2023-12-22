<?php

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Repositories\Auth\IDeletedUserRepository;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class DeletedUserRepository implements IDeletedUserRepository
{

    public function deleteUser(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::find($request->id);
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully.'
            ], 200);
        } catch (Exception $exception) {
            // Handle any errors gracefully
            return response()->json([
                'error' => 'Failed to delete user.',
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
