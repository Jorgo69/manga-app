<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ListeComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home.index');

Route::get('liste', ListeComponent::class)->name('liste.index');

Route::get('category', CategoryComponent::class)->name('category.index');

Route::get('about', AboutComponent::class)->name('about.index');

Route::get('blog', BlogComponent::class)->name('blog.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';