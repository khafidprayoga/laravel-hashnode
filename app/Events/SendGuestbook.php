<?php

namespace App\Events;

use App\Models\Guestbook;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendGuestbook
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new guestbook to the database
     */
    public function __construct(array $data)
    {
        Guestbook::create($data);
    }

}
