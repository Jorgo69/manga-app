<?php

namespace App\Http\Livewire\Admin;

use App\Models\Genre;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditGenresComponent extends Component
{
    public $genre_id;
    public $name;
    public $description;
    public $slug;

    public function mount($genre_id)
    {
        $genres = Genre::find($genre_id);
        $this->name = $genres ->name  ;
        $this->description = $genres ->description  ;
        $this->slug = $genres ->slug  ;
    }

    public function SlugGenerate()
    {
        $this->slug = Str::slug($this->name);
    }

    public function EditGenre()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $genre = Genre::find($this->genre_id);
        $genre ->name = $this->name;
        $genre ->description = $this->description;
        $genre ->slug = $this->slug;

        $genre->save();

        return redirect()->route('admin.genres')->with('success', 'Modification apporté avec Success');


    }
    public function render()
    {
        return view('livewire.admin.admin-edit-genres-component');
    }
}
