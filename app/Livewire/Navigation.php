<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navigation extends Component
{
    public bool $showBackBtn = true;

    public function render()
    {
        if (Route::currentRouteName() !== 'blog.show') {
            $this->showBackBtn = false;
        }

        return view('livewire.navigation');
    }
}
