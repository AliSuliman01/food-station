<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Main extends Component
{
    private $viewName = 'find-food';

    protected $listeners = ['navPageChanged' => 'changePage'];

    public function changePage($viewName)
    {
        $this->viewName = $viewName;
    }

    public function render()
    {
        return view($this->viewName);
    }
}
