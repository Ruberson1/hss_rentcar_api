<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Services\Reservation\IReservationService;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function __construct(
        private readonly IReservationService $reservationService
    )
    {
    }

    /**
     * Handle an incoming registration request.
     *
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'car_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'start_reservation_date' => ['required','date'],
            'end_reservation_date' => ['required', 'date'],
            'canceled' => ['required', 'bool'],
        ]);
        return $this->reservationService->register($request);
    }

    public function getAll(Request $request): JsonResponse
    {
        return $this->reservationService->getAll($request);
    }

    public function getByCar(Request $request): JsonResponse
    {
        return $this->reservationService->getByCar($request);
    }

    public function update(Request $request): JsonResponse
    {
        return $this->reservationService->update($request);
    }

    public function getByUser(Request $request): JsonResponse
    {
        return $this->reservationService->getByUser($request);
    }

    public function canceled(Request $request): JsonResponse
    {
        return $this->reservationService->cancel($request);
    }
}
