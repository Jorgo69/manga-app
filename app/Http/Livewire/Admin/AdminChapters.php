<?php

namespace App\Http\Livewire\Admin;

use App\Models\Chapter;
use Livewire\Component;
use Livewire\WithPagination;

class AdminChapters extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $chapters_id;

    public $perPage = 10;

    public function deleteChapter()
    {
        $chapter = Chapter::find($this->chapters_id);
        $chapter->delete();
        session()->flash('danger', 'Chapitre supprimé avec success');
    }

    public function render()
    {
        $chapters = Chapter::with('manga', 'genre')->paginate($this->perPage);

        return view('livewire.admin.admin-chapters',[
            'chapters' => $chapters,
        ]);
    }
}
