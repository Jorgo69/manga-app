<?php

namespace App\Http\Livewire\Admin;

use App\Models\Manga;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMangasComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $mangas_id;

    // public $perPage = 10;
    



    public function deleteManga()
    {
        $manga = Manga::find($this->mangas_id);
        $manga->delete();
        session()->flash('danger', 'Manga supprimer avec success');
    }

    public function render()
    {
        $mangas = Manga::with('author')->paginate(10);
        
        return view('livewire.admin.admin-mangas-component',[
            'mangas' => $mangas,
        ]);
    }
}
