<?php

use App\Http\Controllers\NewsletterController;
use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\Blog\ShowPost;
use App\Livewire\OpenSource;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::feeds();

Route::get('/', Welcome::class);
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{post}', ShowPost::class)->name('show-post');
Route::get('/open-source', OpenSource::class)->name('open-source.index');
Route::get('/about', About::class)->name('about');
Route::get('/newsletter/confirm-subscription', [NewsletterController::class, 'confirmSubscription'])->name('newsletter.confirm-subscription');
