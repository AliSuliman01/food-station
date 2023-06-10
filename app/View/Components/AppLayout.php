<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $background;

    public $blurBg;

    public function __construct($background = 'mainGradientBg', $blurBg = false)
    {
        $this->background = $background;
        $this->blurBg = $blurBg;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
