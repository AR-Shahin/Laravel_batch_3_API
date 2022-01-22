<?php

namespace App\View\Components\Alert;

use Illuminate\View\Component;

class error extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $nums;
    public function __construct($title, $nums)
    {
        $this->title = $title;
        $this->nums = $nums;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert.error');
    }
}
