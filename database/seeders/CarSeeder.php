<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'Fiat',
                'model' => 'Toro',
                'plate' => 'HVV-5579',
                'year' => 2023
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'plate' => 'HJJ-3579',
                'year' => 2023
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'HB20',
                'plate' => 'HGI-5929',
                'year' => 2023
            ],

        ];

        Car::insert($cars);
    }
}
