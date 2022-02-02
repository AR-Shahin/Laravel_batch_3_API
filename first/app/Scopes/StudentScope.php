<?php

namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StudentScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('vote', '>', 150);
    }
}
