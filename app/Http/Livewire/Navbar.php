<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{
    public $activeNavPage;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->activeNavPage = Route::current()->getName();
    }

    public function setActiveNavPage($activeNavPage)
    {
        $this->activeNavPage = $activeNavPage;

        return redirect()->to(route($this->activeNavPage));
    }

    public function render()
    {
        return view('livewire.navbar', [
            'activeNavPage' => $this->activeNavPage,
        ]);
    }
}
