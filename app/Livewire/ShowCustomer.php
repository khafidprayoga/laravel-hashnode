<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\Wireable;

class ShowCustomer extends Component implements Wireable
{
    public Customer $customer;

    public function render()
    {
        return view('livewire.show-customer');
    }

    public function toLivewire()
    {
        // TODO: Implement toLivewire() method.
    }

    public static function fromLivewire($value)
    {
        // TODO: Implement fromLivewire() method.
    }
}
