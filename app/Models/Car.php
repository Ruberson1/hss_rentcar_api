<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand',
        'model',
        'plate',
        'year',
        'reserved',
        'category_id'
    ];

    protected $casts = [
        'reserved' => 'boolean'
    ];

    protected $with = [
        'categories'
    ]

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
