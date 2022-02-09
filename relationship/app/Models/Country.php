<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function districts()
    {
        return $this->hasManyThrough(District::class, Division::class, 'country_id', 'division_id');
    }
}
