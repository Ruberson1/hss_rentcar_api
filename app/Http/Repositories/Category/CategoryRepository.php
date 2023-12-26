<?php

namespace App\Http\Repositories\Category;

use App\Http\Interfaces\Repositories\Category\ICategoryRepository;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryRepository implements ICategoryRepository
{

    public function getAll(Request $request): JsonResponse
    {
        $cars = Category::all();

        return response()->json($cars);
    }
}
