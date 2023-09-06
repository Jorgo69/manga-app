<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Manga;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditMangasComponent extends Component
{
    use WithFileUploads;

    public $mangas_id;

    public $cover_image;
    public $title;
    public $description;
    public $author_id;
    public $featured;
    public $new_cover_image;
    public $selectedGenres = [];



    public function mount($mangas_id)
    {
        $manga = Manga::with('genres')->find($mangas_id);
        $this->cover_image = $manga->cover_image;
        $this->title = $manga->title;
        $this->description = $manga->description;
        $this->author_id = $manga->author_id;
        $this->featured = $manga->featured;
        $this->selectedGenres = $manga->genres->pluck('id')->toArray();
        // dd($this->selectedGenres);
    }
    

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'author_id' => 'required',
            'featured' => 'required',
            'selectedGenres' => 'required',
        ]);

        // 'cover_image' => 'required|mimetypes:application/pdf,image/jpeg,image/png,image/jpg,image/gif',
        // le champ 'cover_image' sera obligatoire et acceptera les fichiers PDF ainsi que les images aux formats JPEG, PNG, JPG et GIF

        // 'cover_image' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        // acceptera uniquement les fichiers PDF et les fichiers Word (docx). 

    }

    public function MangasEdit()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'required',
            // 'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif', // Change 'required' to 'nullable' for optional cover_image update
            'author_id' => 'required',
            'featured' => 'required',
            'selectedGenres' => 'required',
        ]);
        

    $mangas = Manga::findOrFail($this->mangas_id); // Find the existing manga

    // dd($mangas);

    if($this->new_cover_image)
        {
            unlink('assets/imgs/mangas/'.$mangas->cover_image);
            $imageName = Carbon::now()->timestamp. '.' .$this->new_cover_image->extension();
            $this->new_cover_image->storeAs('mangas', $imageName);
            $mangas->cover_image = $imageName;

        }
    
    // if ($this->new_cover_image) {
    //     // Supprimer l'ancienne image si elle existe
    //     if (Storage::disk('public')->exists('mangas/' . $manga->cover_image)) {
    //         Storage::disk('public')->delete('mangas/' . $manga->cover_image);
    //     }

    //     $imageName = Carbon::now()->timestamp . '.' . $this->new_cover_image->extension();
    //     $this->new_cover_image->storeAs('mangas', $imageName, 'public');
    //     $manga->cover_image = $imageName;
    // }

    $mangas->title = $this->title;
    $mangas->description = $this->description;
    $mangas->author_id = $this->author_id;
    $mangas->featured = $this->featured;
    $mangas->user_id = Auth::id();
    $mangas->save();

    // Récupérer l'ID du manga modifié
    $mangaId = $mangas->id;

    // Détacher tous les genres associés au manga
    $mangas->genres()->detach();

    // Attacher les genres associés au manga
    $mangas->genres()->attach($this->selectedGenres, ['manga_id' => $mangaId]);
    return redirect()->route('admin.mangas')->with('success', 'Manga modifié avec succès');
    }


    public function render()
    {
        $authors = Author::orderBy('pseudo', 'ASC')->get();

        $featureds = ['on', 'off'];

        $genres = Genre::orderBy('name', 'ASC')->get();


        return view('livewire.admin.admin-edit-mangas-component',[
            'authors' => $authors,
            'featureds' => $featureds,
            'genres' => $genres,
        ]);
    }
}
