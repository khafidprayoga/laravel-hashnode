<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('blog.index', [], 301);
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/tag/{tag}', [BlogController::class, 'indexByTag'])->name('blog.tags');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

Route::prefix('page')->group(function () {
    Route::get('/about-me', [PageController::class, 'show'])->name('page.about');
    Route::view('/contact', 'page.contact')->name('page.contact');
    Route::post('/contact', [PageController::class, 'guestbookAction'])->name('page.guestbookAction');
    Route::get('/privacy-policy', [PageController::class, 'show'])->name('page.privacy');
});
