<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Manga;
use Livewire\Component;

class HomeComponent extends Component
{
    public $pageTitle = "Mes Recueilles";

    
    public function render()
    {
        
        // $chapters = Chapter::orderBy('id', 'ASC')->take(20)->get();
        // $chapters = Chapter::with('manga', 'author')->orderBy('id', 'ASC')->take(20)->get();
        $chapters = Chapter::with('manga', 'author')->orderBy('id', 'DESC')->take(4)->get();

        $recents = Chapter::with('manga', 'author')->orderBy('id', 'DESC')->take(20)->get();

        $genres = Genre::orderBy('name', 'ASC')->get();

        $mangas = Manga::orderBy('title', 'ASC')->get();

        $this->pageTitle = 'Accueil ' .config('app.name') ;
        
        return view('livewire.home-component',
        [
            'chapters' => $chapters,
            'genres' => $genres,
            'mangas' => $mangas,
            'recents' => $recents
        ]
    );
    }
}
