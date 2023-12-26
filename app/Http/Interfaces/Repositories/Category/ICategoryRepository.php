<?php

namespace App\Http\Interfaces\Repositories\Category;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ICategoryRepository
{
    public function getAll(Request $request): JsonResponse;
}
