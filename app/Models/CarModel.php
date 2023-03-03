<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'marc_id',
    ];

    public function carMarc()
    {
        return $this->belongsTo(CarMarc::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
