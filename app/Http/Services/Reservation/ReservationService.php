<?php

namespace App\Http\Services\Reservation;

use App\Http\Interfaces\Repositories\Reservation\IReservationRepository;
use App\Http\Interfaces\Services\Reservation\IReservationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationService implements IReservationService
{

    public function __construct(
        private readonly IReservationRepository $reservationRepository
    )
    {
    }

    public function register(Request $request): JsonResponse
    {
        return $this->reservationRepository->register($request);
    }

    public function getAll(Request $request): JsonResponse
    {
        return $this->reservationRepository->getAll($request);
    }

    public function getByCar(Request $request): JsonResponse
    {
        return $this->reservationRepository->getByCar($request);
    }

    public function update(Request $request): JsonResponse
    {
        return $this->reservationRepository->update($request);
    }

    public function getByUser(Request $request): JsonResponse
    {
        return $this->reservationRepository->getByUser($request);
    }

    public function cancel(Request $request): JsonResponse
    {
        return $this->reservationRepository->cancel($request);
    }
}
