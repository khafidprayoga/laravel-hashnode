<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ContactList extends Component
{
    public array $contacts;
    public array $newContact = [
        'name' => '',
        'phone' => '',
        'address' => '',
    ];

    public function mount()
    {
        $this->contacts = Contact::query()->where('is_deleted', false)->orderBy('id','desc')->limit(3)->get()->toArray();
    }

    public function addContact()
    {
        $this->contacts[] = Contact::query()->create($this->newContact)->toArray();

        $this->newContact = [];
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
