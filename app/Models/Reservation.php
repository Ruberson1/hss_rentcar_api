<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car_id',
        'user_id',
        'start_reservation_date',
        'end_reservation_date',
        'canceled',
        'confirm_rental',
        'confirm_return'
    ];

    protected $casts = [
        'canceled' => 'boolean',
        'confirm_rental' => 'boolean',
        'confirm_return' => 'boolean',
        'start_reservation_date' => 'date:d/m/Y H:i:s',
        'end_reservation_date' => 'date:d/m/Y H:i:s',
    ];
}
