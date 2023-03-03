<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'mileage',
        'statuses_id',
        'year_of_release',
        'model_car_id',
    ];

    public function carEvents()
    {
        return $this->hasMany(CarEvent::class);
    }

    public function carStatus()
    {
        return $this->belongsTo(CarStatus::class);
    }
}
