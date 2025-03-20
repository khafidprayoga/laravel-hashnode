<?php

namespace Tests\Feature;

use App\Livewire\ContactList;
use Livewire\Livewire;
use Tests\TestCase;

//class ContactListTest extends TestCase
//{
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//
//    public function test_it_should_dispatch_event()
//    {
//        Livewire::test(ContactList::class)->call("addContact")->assertDispatched("contact-added");
//    }
//}


test('example', function () {
    Livewire::test(ContactList::class)->call("addContact")->assertDispatched("contact-added");

})->uses(ContactList::class);
