<?php

namespace App\Listeners;

use App\Events\RegisterReservation;
use App\Http\Interfaces\Repositories\Car\ICarRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusCar
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly ICarRepository $carRepository
    ){}


    /**
     * Handle the event.
     */
    public function handle(RegisterReservation $event): void
    {
        $carId = $event->request->car_id;
        $isReserved = true;

        $this->carRepository->reserved(carId: $carId, isReserved: $isReserved);
    }
}
