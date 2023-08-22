<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Manga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListeComponent extends Component
{
    public $pageTitle = "Mes Recueilles";

    public $slug;
    public $chapter_id;
    public $manga_id;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function AddFavorite()
    {
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $chapter = Chapter::with('manga')->where('slug', $this->slug)->firstOrFail();
        $favorite->manga_id = $chapter->manga_id ;
        dd($favorite);
        // $favorite->save();
    }

    public function RemoveFavorite()
    {
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $chapter = Chapter::with('manga')->where('slug', $this->slug)->firstOrFail();
        $favorite->manga_id = $chapter->manga_id ;
        dd($favorite);
    }

    public function render()
    {
        $chapter = Chapter::with('manga', 'author')->where('slug', $this->slug)->firstOrFail();

        // $liers = Chapter::where('author_id', $chapter->author_id)->with('manga')->get();
    // dd($liers);

    // les mangas du meme auteur sauf le  manga actuel
    $liers = Chapter::where('author_id', $chapter->author_id)
            ->where('manga_id', '!=', $chapter->manga_id) // Exclure le manga actuel
            ->with('manga')
            ->get();


        $listes = Chapter::where('manga_id', $chapter->manga_id)->get();

        $genres = Genre::with('mangas')->orderBy('name', 'ASC')->get();

        $mangas = Manga::with('genres')->where('slug', $this->slug)->get();

        $userId = Auth::id();
        $userId = Auth::id();
        $favorites = Favorite::where('user_id', $userId)->pluck('manga_id')->toArray();
        

        $this->pageTitle = 'Liste ' .$chapter->manga->title ;

        return view('livewire.liste-component',[
            'chapter' => $chapter,
            'liers' => $liers,
            'listes' => $listes,
            'genres' => $genres,
            'mangas' => $mangas,
            'favorites' => $favorites,
            // 'mangaId' => $mangaId,
        ]);
    }
}
