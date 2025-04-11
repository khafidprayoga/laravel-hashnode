<?php

namespace App\Livewire;

use App\Services\HashnodeService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Publications extends Component
{
    private HashnodeService $hashnode;

    public array $posts;
    public string $search;
    public bool $hasNext = true;

    public function mount(HashnodeService $service)
    {
        $this->hashnode = $service;
        $this->loadMore();
    }

    public function loadMore()
    {
        // at the end of the page
        if (!$this->hasNext) {
            return;
        }


        $response = $this->hashnode->getPosts();
        $this->posts = $response->posts;
    }

    public function render()
    {
        return view('livewire.publications');
    }
}
