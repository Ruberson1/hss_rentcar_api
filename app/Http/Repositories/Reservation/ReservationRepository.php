<?php

namespace App\Http\Repositories\Reservation;

use App\Http\Interfaces\Repositories\Reservation\IReservationRepository;
use App\Models\Reservation;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationRepository implements IReservationRepository
{

    public function register(Request $request): JsonResponse
    {
        try {
            $reservation = new Reservation();
            $reservation->car_id = $request->car_id;
            $reservation->user_id = $request->user_id;
            $reservation->start_reservation_date = $request->start_reservation_date;
            $reservation->end_reservation_date = $request->end_reservation_date;
            $reservation->canceled = $request->canceled;

            $reservation->save();
            return response()->json([
                'message' => 'reservation created successfully.'
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'error' => 'Failed to create reservation.',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getAll(Request $request): JsonResponse
    {
        $reservations = Reservation::all();

        return response()->json($reservations);
    }

    public function getByCar(Request $request): JsonResponse
    {
        $carId = $request->car_id;

        try {
            $reservation = Reservation::where('car_id', $carId)->get();
            return response()->json($reservation);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }
    }

    public function update(Request $request): JsonResponse
    {
        $reservationId = $request->id;

        try {
            $car = Reservation::findOrFail($reservationId);
            $car->update($request->all());
            return response()->json($car);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }

    public function getByUser(Request $request): JsonResponse
    {
        $userId = $request->user_id;

        try {
            $reservation = Reservation::where('user_id', $userId)->get();
            return response()->json($reservation);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }
    }

    public function cancel(Request $request): JsonResponse
    {
        $reservationId = $request->id;
        $canceled = $request->validate([
            'canceled' => 'boolean',
        ]);

        try {
            $car = Reservation::findOrFail($reservationId);
            $car->canceled = $canceled['canceled'];
            $car->save();
            return response()->json(['message' => 'Reservation reserved status updated'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }
    }
}
