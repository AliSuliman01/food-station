<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FindFood extends Component
{
    public function orderNow()
    {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.find-food');
    }
}
