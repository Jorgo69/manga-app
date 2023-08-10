<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminAddAuthorsComponent;
use App\Http\Livewire\Admin\AdminAddChapters;
use App\Http\Livewire\Admin\AdminAddGenresComponent;
use App\Http\Livewire\Admin\AdminAddMangasComponent;
use App\Http\Livewire\Admin\AdminAuthor;
use App\Http\Livewire\Admin\AdminChapters;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditAuthorsComponent;
use App\Http\Livewire\Admin\AdminEditChaptersComponent;
use App\Http\Livewire\Admin\AdminEditMangasComponent;
use App\Http\Livewire\Admin\AdminGenresComponent;
use App\Http\Livewire\Admin\AdminMangasComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CommentsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ListeComponent;
use App\Http\Livewire\StreamingComponent;
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

Route::get('liste/{slug}', ListeComponent::class)->name('manga.chapters.liste');

Route::get('streaming/{chapter_id}', StreamingComponent::class)->name('chapter.streaming');

Route::get('comments/{chapter_id}', CommentsComponent::class)->name('chapter.comment');

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


    // Route::get('comments/{slug}', CommentsComponent::class)->name('chapter.comment');
});

Route::middleware(['auth', 'auth.admin'])->group(function(){
    Route::get('/admin,admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');


    Route::get('admin/auteur', AdminAuthor::class)->name('admin.authors');
    Route::get('admin/authors/add', AdminAddAuthorsComponent::class)->name('admin.add.authors');
    Route::get('admin/authors/edit/{authors_id}', AdminEditAuthorsComponent::class)->name('admin.authors.edit');


    Route::get('admin/genres', AdminGenresComponent::class)->name('admin.genres');
    Route::get('admin/genres/add', AdminAddGenresComponent::class)->name('admin.add.genres');

    Route::get('admin/mangas', AdminMangasComponent::class)->name('admin.mangas');
    Route::get('admin/mangas/add', AdminAddMangasComponent::class)->name('admin.add.mangas');
    Route::get('admin/mangas/edit/{mangas_id}', AdminEditMangasComponent::class)->name('admin.edit.mangas');

    Route::get('admin/chapters', AdminChapters::class)->name('admin.chapters');
    Route::get('admin/chapters/add', AdminAddChapters::class)->name('admin.add.chapters');
    Route::get('admin/chapters/edit/{chapters_id}', AdminEditChaptersComponent::class)->name('admin.edit.chapters');
});

require __DIR__.'/auth.php';
