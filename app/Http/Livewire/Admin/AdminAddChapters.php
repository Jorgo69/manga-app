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
    public $chapter_number;
    public $slug;
    public $title;
    public $content;
    public $author_id;
    public $genre_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'manga_id' => 'required',
            'chapter_number' => 'required',
            'slug'=> 'required',
            'title' => 'required',
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
        $chapters->slug = $this->slug;
        
        $manga = Manga::find($this->manga_id);
        $chapters->author_id = $manga->author_id;
        $chapters->genre_id = $manga->genre_id;

        $imageName = Carbon::now()->timestamp. '.' .$this->content->extension();
        $this->content->storeAs('chapters', $imageName);
        $chapters->content = $imageName;

        $chapters-> save();

        return redirect()->back()->with('success', 'Chapitre Creer avec Success');
    }


    public function render()
    {
        $mangas = Manga::orderBy('title', 'ASC')->get();

        return view('livewire.admin.admin-add-chapters',[
            'mangas' => $mangas,
        ]);
    }
}
