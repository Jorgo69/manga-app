<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAuthor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $authors = Author::with('mangas')->paginate(6);

        return view('livewire.admin.admin-author',[
            'authors' => $authors,
        ]);
    }
}
