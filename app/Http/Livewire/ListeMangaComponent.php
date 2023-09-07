<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Manga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListeMangaComponent extends Component
{
    public $slug;
    public $pageTitle = 'Manga';

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function AddFavorite()
    {
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $manga = Manga::with('chapters')->where('slug', $this->slug)->firstOrFail();
        $favorite->manga_id = $manga->id;
        $favorite->save();
    }

    public function RemoveFavorite()
    {
        $manga = Manga::with('chapters')->where('slug', $this->slug)->firstOrFail();
        
        $favorite = Favorite::where('manga_id', $manga->id)->firstOrFail(); 
        
        $favorite->delete();
    }

    
    public function render()
    {
        $manga = Manga::with('chapters', 'author')->where('slug', $this->slug)->firstOrFail();

            // les mangas du meme auteur sauf le  manga actuel
        $liers = Manga::where('author_id', $manga->author_id)
        ->where('id', '!=', $manga->id) // Exclure le manga actuel
        ->get();

        $genres = Genre::with('mangas')->orderBy('name', 'ASC')->get();

        
        $listes = Chapter::with('manga')->where('manga_id', $manga->id)->get();
        
        $userId = Auth::id();
        $favorites = Favorite::where('user_id', $userId)->pluck('manga_id')->toArray();

        $this->pageTitle = $manga->title;
        
        return view('livewire.liste-manga-component', [
            'manga' => $manga,
            'liers' => $liers,
            'genres' => $genres,
            'listes' => $listes,
            'favorites' => $favorites
        ]);
    }
}
