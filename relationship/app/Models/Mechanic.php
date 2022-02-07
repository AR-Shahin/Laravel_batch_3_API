<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Mechanic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner(): HasOneThrough
    {
        return $this->hasOneThrough(Owner::class, Car::class, 'mechanic_id', 'car_id');
    }
}
