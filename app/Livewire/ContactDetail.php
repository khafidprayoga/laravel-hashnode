<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ContactDetail extends Component
{

    #[Computed]
    public function contact()
    {
        return Contact::query()
            ->where('phone', '+628130000001')
            ->select(['name', 'phone', 'address'])->first()->toArray();
    }

    public function render()
    {
        return view('livewire.contact-detail')->with('contact', $this->contact);
    }
}
