<?php

namespace App\Composers;

use Illuminate\View\View;

class Demo
{

    public function compose(View $view)
    {
        $view->with('abc', 'ABC Title');
    }
}
