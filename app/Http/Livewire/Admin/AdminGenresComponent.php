<?php

namespace App\Http\Livewire\Admin;

use App\Models\Genre;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGenresComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $genre_id;

    public function deleteGenre()
    {
        $genre = Genre::find($this->genre_id);
        $genre ->delete();
        session()->flash('danger', 'Genre Supprime avec Success');
    }

    public function render()
    {
        $genres = Genre::paginate(6);

        return view('livewire.admin.admin-genres-component',[
            'genres' => $genres,
        ]);
    }
}
