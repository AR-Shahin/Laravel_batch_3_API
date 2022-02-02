<?php

namespace App\Models;

// use App\Scope;
// use App\Scope\StudentScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    // protected $database = 'custom_database';
    // protected $connection = 'sqlite';
    // protected $primaryKey = 'flight_id';
    protected $fillable = [
        'name', 'email', 'is_admin', 'vote'
    ];
    // protected $guarded = [];

    // protected $attributes = [
    //     'vote' => 100,
    // ];

    // protected static function booted()
    // {
    //     // static::addGlobalScope('popular', function (Builder $builder) {
    //     //     $builder->where('vote', '>', 150);
    //     // });
    //     // static::addGlobalScope(new StudentScope);
    // }

    function scopePopular($query, $params)
    {
        return $query->where('vote', '>', $params);
    }
    function scopeActive($query)
    {
        return $query->whereIsActive(true);
    }

    public function scopeMulti($query)
    {
        return $query->popular(200)->active();
    }

    // protected static function booted()
    // {
    //     static::created(function ($user) {
    //         info('Data Created');
    //     });
    // }
}
