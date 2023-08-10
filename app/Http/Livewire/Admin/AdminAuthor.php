<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAuthor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $authors_id;

    public function deleteAuthor()
    {
        $authors = Author::find($this->authors_id);
        // dd($authors);
        $authors->delete();
        session()->flash('success', 'Autheur supprime avec success');
    }

    public function render()
    {
        $authors = Author::with('mangas')->paginate(6);

        return view('livewire.admin.admin-author',[
            'authors' => $authors,
        ]);
    }
}
