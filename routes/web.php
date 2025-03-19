<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Livewire;

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

Route::view('counter', "welcome");
Route::get('post', Livewire\CreatePost::class);
Route::get('contacts', Livewire\ContactList::class);
Route::get('contact', Livewire\ContactDetail::class);
