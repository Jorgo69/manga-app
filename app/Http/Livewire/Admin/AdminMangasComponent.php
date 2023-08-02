<?php

namespace App\Http\Livewire\Admin;

use App\Models\Manga;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMangasComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;


    public function render()
    {
        $mangas = Manga::with('author')->paginate($this->perPage);

        return view('livewire.admin.admin-mangas-component',[
            'mangas' => $mangas,
        ]);
    }
}
