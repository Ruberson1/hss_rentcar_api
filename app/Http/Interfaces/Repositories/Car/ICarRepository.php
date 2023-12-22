<?php

namespace App\Http\Interfaces\Repositories\Car;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ICarRepository
{
    public function register(Request $request): JsonResponse;

    public function getAll(Request $request): JsonResponse;

    public function getOneById(Request $request): JsonResponse;

    public function update(Request $request): JsonResponse;

    public function reserved(Request $request): JsonResponse;

    public function delete(Request $request): JsonResponse;
}
