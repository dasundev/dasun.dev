<?php

declare(strict_types=1);

use App\Http\Controllers\NewsletterController;
use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\Blog\ShowPost;
use App\Livewire\OpenSource;
use App\Livewire\Packages\LivewireDropzone\Index as LivewireDropzoneThemes;
use App\Livewire\PrivacyPolicy;
use App\Livewire\RefundPolicy;
use App\Livewire\Terms;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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
Route::get('/refund-policy', RefundPolicy::class)->name('refund-policy');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('/terms', Terms::class)->name('terms-of-condition');
Route::get('/newsletter/confirm-subscription', [NewsletterController::class, 'confirmSubscription'])->middleware('signed')->name('newsletter.confirm-subscription');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Volt::route('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'livewire.profile')->middleware(['auth'])->name('profile');

Route::get('products/livewire-dropzone-themes', LivewireDropzoneThemes::class)->name('products.livewire-dropzone-themes');

require __DIR__.'/auth.php';
