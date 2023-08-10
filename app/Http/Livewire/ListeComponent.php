<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Manga;
use Livewire\Component;

class ListeComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
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

        return view('livewire.liste-component',[
            'chapter' => $chapter,
            'liers' => $liers,
            'listes' => $listes,
            'genres' => $genres,
            'mangas' => $mangas
        ]);
    }
}
