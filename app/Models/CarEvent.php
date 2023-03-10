<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'latitude',
        'langitude',
        'fuel',
        'speed',
        'renter_id',
        'car_id',
        'car_status_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }

    public function carStatus()
    {
        return $this->belongsTo(CarStatus::class);
    }
}
