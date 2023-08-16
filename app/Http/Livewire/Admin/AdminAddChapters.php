<?php

namespace App\Http\Livewire\Admin;

use App\Models\Chapter;
use App\Models\Manga;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddChapters extends Component
{
    use WithFileUploads;
    
    public $manga_id;
    public $chapter_number, $chapterSlug;
    public $slug;
    public $chapter_cover;
    public $title;
    public $content;
    public $author_id;
    public $genre_id;

    public $ex = 'Exemple';

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function generate()
    {
        $this->chapterSlug = Str::slug($this->chapter_number);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'manga_id' => 'required',
            'chapter_number' => 'required',
            'slug'=> 'required',
            'title' => 'required',
            'chapter_cover' => 'required',
            'content' => 'required',
        ]);
    }

    public function ChaptersAdd()
    {
        $this->validate([
            'manga_id' => 'required',
            'chapter_number' => 'required',
            'slug'=> 'required',
            'title' => 'required',
            'chapter_cover' => 'required',
            'content' => 'required',
        ]);

        // Pour l'enreigitrement des images en local
        // se rendre dans config/filesystems
        // 'disks' => [
            // 'local' => [
            // 'root' => public_path('assets/imgs'),
            
        $chapters = new Chapter();
        $chapters->manga_id = $this->manga_id;
        $chapters->chapter_number = $this->chapter_number;
        $chapters->title = $this->title;
        
        $imageCover = Carbon::now()->timestamp. '.' .$this->chapter_cover->extension();
        $this->chapter_cover->storeAs('chapters/covers', $imageCover);
        $chapters->chapter_cover= $imageCover;

        $chapters->slug = $this->slug. '_' .$this->chapterSlug;
        
        $manga = Manga::find($this->manga_id);
        $chapters->author_id = $manga->author_id;
        $chapters->genre_id = $manga->genre_id;

        $imageName = Carbon::now()->timestamp. '.' .$this->content->extension();
        $this->content->storeAs('chapters', $imageName);
        $chapters->content = $imageName;

        // dd($chapters);

        $chapters-> save();

        session()->flash('success', 'Chapitre Creer avec Success');
    }


    public function render()
    {
        $mangas = Manga::orderBy('title', 'ASC')->get();

        return view('livewire.admin.admin-add-chapters',[
            'mangas' => $mangas,
        ]);
    }
}