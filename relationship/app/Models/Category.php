<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // protected $with = ['products'];
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    // public function posts(): HasMany
    // {
    //     return $this->hasMany(Product::class);
    // }

    public function latest_product()
    {
        return $this->hasOne(Product::class)->latestOfMany();
    }

    public function oldest_product()
    {
        return $this->hasOne(Product::class)->oldestOfMany();
    }
}
