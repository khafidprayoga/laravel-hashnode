<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class CreatePost extends Component
{

    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required')]
    public string $content;

    public function save()
    {
        $this->validate();

        session()->flash('status', 'Post Created Successfully');
        return $this->redirect('/post');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
