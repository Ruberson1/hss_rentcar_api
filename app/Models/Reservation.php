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
        'category_id',
        'start_reservation_date',
        'end_reservation_date',
        'confirm_reservation',
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

    protected $with = [
        'users'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
