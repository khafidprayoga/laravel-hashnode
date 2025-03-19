<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ContactList extends Component
{
    public array $contacts;

    // default values here not from the mount method
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
//        $this->contacts[] = Contact::query()->create($this->newContact)->toArray();
        $this->contacts[] = Contact::query()->create($this->pull('newContact'))->toArray();
//        $this->reset('newContact');
//        simplify many props varibale
//        $this->reset('newContact', 'contacts');
//         specific vars repeatedly
//         $this->newContact = [];
        $this->js("onAddContact");
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
