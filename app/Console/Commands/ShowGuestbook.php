<?php

namespace App\Console\Commands;

use App\Models\Guestbook;
use Illuminate\Console\Command;

class ShowGuestbook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-guestbook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show user guestbook';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        file_put_contents('guestbook.json', Guestbook::all()->toJson(JSON_PRETTY_PRINT));
    }
}
