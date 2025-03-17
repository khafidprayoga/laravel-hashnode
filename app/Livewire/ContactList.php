<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ContactList extends Component
{
    public string $name = '';
    public string $phone = '';
    public string $address = '';

    public function mount()
    {
        $contacts = Contact::first();
        $this->fill(
            $contacts->only('name', 'phone', 'address')
        );
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
