<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ControlBar extends Component
{
    /**
     * @var string
     */
    public $addingButtonTarget;
    public $searching;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($addingButtonTarget, $searching = false)
    {
        $this->addingButtonTarget = $addingButtonTarget;
        $this->searching = $searching;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.control-bar');
    }
}
