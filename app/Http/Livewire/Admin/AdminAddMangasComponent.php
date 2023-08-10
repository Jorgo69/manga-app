<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Manga;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddMangasComponent extends Component
{
    use WithFileUploads;

    public $cover_image;
    public $title;
    public $slug;
    public $description;
    public $author_id;
    public $selectedGenres = [];

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'selectedGenres' => 'required',
        ]);

        // 'cover_image' => 'required|mimetypes:application/pdf,image/jpeg,image/png,image/jpg,image/gif',
        // le champ 'cover_image' sera obligatoire et acceptera les fichiers PDF ainsi que les images aux formats JPEG, PNG, JPG et GIF

        // 'cover_image' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        // acceptera uniquement les fichiers PDF et les fichiers Word (docx). 

    }

    public function SlugGenerate()
    {
        $this->slug = Str::slug($this->title);
    }

    public function MangasAdd()
    {
        $this->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'selectedGenres' => 'required',
        ]);

        $mangas = new Manga();
        
        $imageName = Carbon::now()->timestamp. '.' .$this->cover_image->extension();
        $this->cover_image->storeAs('mangas', $imageName);
        $mangas->cover_image = $imageName;

        $mangas->title = $this->title;
        $mangas->slug = $this->slug;
        $mangas->description = $this->description;
        $mangas->author_id = $this->author_id;
        $mangas->user_id = Auth::id();
        

        // $genres = $this->selectedGenres;

        // dd($mangas);
        $mangas-> save();

        // Récupérer l'ID du manga nouvellement créé
        $mangaId = $mangas->id;

    // Attacher les genres associés au manga
        $mangas->genres()->attach($this->selectedGenres, ['manga_id' => $mangaId]);
        return redirect()-> back()->with('success', 'Manga ajouter avec success');
        
    }

    public function render()
    {
        $authors = Author::orderBy('pseudo', 'ASC')->get();
        $genres = Genre::orderBy('name', 'ASC')->get();

        return view('livewire.admin.admin-add-mangas-component',[
            'authors' => $authors,
            'genres' => $genres,
        ]);
    }
}
