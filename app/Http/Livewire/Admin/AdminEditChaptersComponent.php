<?php

namespace App\Http\Livewire\Admin;

use App\Models\Chapter;
use App\Models\Manga;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditChaptersComponent extends Component
{
    use WithFileUploads;
    
    public $chapters_id;

    public $author_id;
    public $new_content;
    public $new_chapter_cover;

    public $manga_id;
    public $chapter_number;
    public $title;
    public $content;
    public $chapter_cover;


    public function mount($chapters_id)
    {
        $chapter = Chapter::with('author')->find($chapters_id);
        $this->chapters_id = $chapter->id;
        $this->manga_id = $chapter->manga_id;
        $this->title = $chapter->title;
        $this->content = $chapter->content;
        $this->chapter_cover = $chapter->chapter_cover;
        $this->chapter_number = $chapter->chapter_number;

        // Pré-remplir les informations de l'auteur et du genre associés au chapitre
        $this->author_id = $chapter->author->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'manga_id' => 'required',
            'chapter_number' => 'required',
            'title' => 'required',
            'content' => 'required',
            'chapter_cover' => 'required',
        ]);
    }

    public function ChaptersEdit()
    {
        $this->validate([
            'manga_id' => 'required',
            'chapter_number' => 'required',
            'title' => 'required',
            'content' => 'required',
            'chapter_cover' => 'required',
        ]);

        // Pour l'enreigitrement des images en local
        // se rendre dans config/filesystems
        // 'disks' => [
            // 'local' => [
            // 'root' => public_path('assets/imgs'),
            
        $chapters =Chapter::find($this->chapters_id);
        $chapters->manga_id = $this->manga_id;
        $chapters->chapter_number = $this->chapter_number;
        $chapters->title = $this->title;

        if($this->new_content)
        {
            unlink('assets/imgs/chapters/'.$chapters->content);
            $imageName = Carbon::now()->timestamp. '.' .$this->new_content->extension();
            $this->new_content->storeAs('chapters', $imageName);
            $chapters->content = $imageName;
        }
        
        if($this->new_chapter_cover)
        {
            $imageCover = Carbon::now()->timestamp. '.' .$this->new_chapter_cover->extension();
            $this->new_chapter_cover->storeAs('chapters/covers', $imageCover);
            $chapters->chapter_cover = $imageCover;
        }
        
        // dd($chapters);
        $chapters-> save();

        return redirect()->route('admin.chapters')->with('success', 'Chapitre Modifier avec Success');
    }


    public function render()
    {
        $mangas = Manga::orderBy('title', 'ASC')->get();
        $chapters = Chapter::with('author', 'genre')->get();

        return view('livewire.admin.admin-edit-chapters-component', [
            'mangas' => $mangas,
            'chapters' => $chapters,
        ]);
    }
}
