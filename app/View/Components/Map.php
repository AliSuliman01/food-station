<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    public $initLat;

    public $initLong;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($initLat = null, $initLong = null)
    {
        $this->initLat = $initLat;
        $this->initLong = $initLong;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map');
    }
}
