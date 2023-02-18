<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RestaurantCard extends Component
{
    public $restaurant;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.restaurant-card');
    }
}
