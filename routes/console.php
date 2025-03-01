<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('gen', function () {
    $artisans = [];

    for ($i = 1; $i <= 50; $i++) {
        $artisans[] = [
            'id' => $i,
            'name' => "Artisan $i",
            'phone' => "+62813" . str_pad($i, 7, '0', STR_PAD_LEFT),
            'address' => "Jl Example No. $i, City 12345",
            'is_deleted' => false,
        ];
    }

// Konversi ke JSON
    $jsonList = json_encode($artisans, JSON_PRETTY_PRINT);

// Tampilkan JSON
    echo $jsonList;
});
