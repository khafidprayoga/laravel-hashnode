<?php

namespace App\Livewire;

use App\Services\HashnodeService;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;

class Publications extends Component
{
    private ?HashnodeService $hashnode = null;

    // from browser state
    #[Url(as: 'q', except: '')]
    public ?string $search = '';
    #[Url(as: 'cursor', except: '')]
    public ?string $nextCursor = '';

    // internal state
    public array $posts = [];
    public array $pagination;

    public bool $hasNext = true;
    public bool $hasLoaded = false;

    public function boot(HashnodeService $service)
    {
        $this->hashnode = $service;
    }

    public function mount()
    {
        $this->loadMore();

    }

    public function validateParams()
    {
        $search = trim($this->search ?? '');
        // if empty str return null instead
        $search = $search === '' ? null : $search;

        $cursor = trim($this->nextCursor ?? '');

        // if empty str return null instead
        $cursor = $cursor === '' ? null : $cursor;

        // validate base64 and decode if it valid base 64 and digit
        if ($cursor !== null) {
            $decoded = base64_decode($cursor, true);
            if ($decoded === false) {
                $this->nextCursor = '';
                $cursor = null;
            }
        }

        if ($search === null) {
            $this->search = '';
        }

        return compact('search', 'cursor');
    }

    public function loadMore()
    {
        // at the end of the page
        if (!$this->hasNext) {
            return;
        }

        // $request params
        $params = $this->validateParams();

//        Log::debug("params: " . json_encode($params));
        $response = $this->hashnode->getPosts(
            search: $params['search'],
            nextCursor: $params['cursor'],
        );

        $this->hasLoaded = true;
        $this->posts = array_merge($this->posts, $response->posts);
        $this->pagination = $response->pagination;

        if (!$this->pagination['hasNextPage']) {
            $this->hasNext = false;
        } else {
            $this->nextCursor = $this->pagination['endCursor'];
            $this->dispatch('$set', 'nextCursor', $this->nextCursor);
        }
    }

    public function render()
    {
        return view('livewire.publications');
    }
}
