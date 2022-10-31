<?php

use App\Http\Livewire\Pages\FeedPage;
use App\Http\Livewire\Pages\UserPage;
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

Route::get('/', FeedPage::class)->middleware(['auth'])->name('home');
Route::get('/@{username}', UserPage::class)->where('name','[a-zA-Z0-9]+');