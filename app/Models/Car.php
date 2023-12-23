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
        'reserved'
    ];

    protected $casts = [
//        'task_date' => 'date:d/m/Y H:i:s',
//        'homolog_date' => 'date:d/m/Y H:i:s',
//        'dev_date' => 'date:d/m/Y H:i:s',
//        'req_homolog_date' => 'date:d/m/Y H:i:s',
        'reserved' => 'boolean'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
