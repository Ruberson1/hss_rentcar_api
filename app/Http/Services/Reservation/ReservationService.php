<?php

namespace App\Http\Services\Reservation;

use App\Events\RegisterReservation;
use App\Http\Interfaces\Repositories\Car\ICarRepository;
use App\Http\Interfaces\Repositories\Reservation\IReservationRepository;
use App\Http\Interfaces\Services\Reservation\IReservationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ReservationService implements IReservationService
{

    public function __construct(
        private readonly IReservationRepository $reservationRepository,
        private readonly ICarRepository $carRepository
    )
    {
    }

    public function register(Request $request): JsonResponse
    {

        $isOutOfValidPeriod = $this->checkValidPeriod($request);

        if($isOutOfValidPeriod){
            return response()->json(
                [
                    'error' => 'A data de retirada ou devolução não pode ser menor que a data atual'
                ],
                401
            );
        }

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
        $isReserved = $this->checkCarAvailability($request->car_id);

        if($isReserved){
            return response()->json(['error' => 'Veículo indisponível'], 401);
        }

        $isOutOfValidPeriod = $this->checkValidPeriod($request);

        if($isOutOfValidPeriod){
            return response()->json(
                [
                    'error' => 'A data de retirada ou devolução não pode ser menor que a data atual'
                ],
                401
            );
        }

        $result = json_decode($this->reservationRepository->update($request)->status());
        if ($result === ResponseAlias::HTTP_OK) {
            RegisterReservation::dispatch($request);

            return response()->json([
                'message' => 'Locação confirmada com sucesso.'
            ], 200);
        }


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

    protected function checkCarAvailability(int $carId): bool
    {
        $car = $this->carRepository->getOneById(carId: $carId);
        $carReserved = json_decode($car->content());
        return $carReserved->reserved;
    }

    protected function checkValidPeriod(Request $request): bool
    {
        $today = new \DateTime();
        return $request->start_reservation_date < $today->format('Y-m-d H:i:s')
            || $request->end_reservation_date < $today->format('Y-m-d H:i:s');

    }
}
