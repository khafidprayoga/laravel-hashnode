<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Counter extends Component
{
    public int $count;
    public function mount(int $count = 10)
    {
        $this->count = $count;
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.counter');
    }
}
