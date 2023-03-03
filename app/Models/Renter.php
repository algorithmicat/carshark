<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'surname',
        'age',
        'address',
        'passport_number',
        'passport_series',
        'latitude',
        'langitude',
        'balance',
        'user_statuses_id',
    ];

    public function carEvents()
    {
        return $this->hasMany(CarEvent::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }
}
