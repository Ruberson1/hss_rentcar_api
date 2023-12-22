<?php

namespace App\Http\Repositories\Car;

use App\Http\Interfaces\Repositories\Car\ICarRepository;
use App\Models\Car;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CarRepository implements ICarRepository
{

    public function register(Request $request): JsonResponse
    {
        try {
            $car = new Car();
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->plate = $request->plate;
            $car->year = $request->year;
            $car->reserved = $request->reserved;

            $car->save();
            return response()->json([
                'message' => 'car created successfully.'
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'error' => 'Failed to create car.',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getAll(Request $request): JsonResponse
    {
        $cars = Car::all();

        return response()->json($cars);
    }

    public function getOneById(Request $request): JsonResponse
    {
        $carId = $request->id;

        try {
            $car = Car::findOrFail($carId);
            return response()->json($car);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }

    public function update(Request $request): JsonResponse
    {
        $carId = $request->id;

        try {
            $car = Car::findOrFail($carId);
            $car->update($request->all()); // Assuming you want to update all fields
            return response()->json($car);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }

    public function reserved(Request $request): JsonResponse
    {
        $carId = $request->id;
        $reserved = $request->validate([
            'reserved' => 'boolean',
        ]);

        try {
            $car = Car::findOrFail($carId);
            $car->reserved = $reserved['reserved'];
            $car->save();
            return response()->json(['message' => 'Car reserved status updated'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }

    public function delete(Request $request): JsonResponse
    {
        $carId = $request->id;

        try {
            $car = Car::findOrFail($carId);
            $car->delete();
            return response()->json(['message' => 'Car deleted'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }
}
