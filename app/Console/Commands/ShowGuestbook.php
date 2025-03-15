<?php

namespace App\Console\Commands;

use App\Models\Guestbook;
use Carbon\Carbon;
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
        $data =   $data = Guestbook::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'full_name' => $item->full_name,
                'email' => $item->email,
                'messages' => $item->messages,
                'created_at' => Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->toRfc850String(),
                'updated_at' => Carbon::parse($item->updated_at)->timezone('Asia/Jakarta')->toRfc850String(),
            ];
        })->toJson(JSON_PRETTY_PRINT);
        file_put_contents('guestbook.json', $data);
    }
}
