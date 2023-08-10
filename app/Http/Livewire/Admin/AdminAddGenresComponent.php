<?php

namespace App\Http\Livewire\Admin;

use App\Models\Genre;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddGenresComponent extends Component
{
    public $name;
    public $description;
    public $slug;

    public function SlugGenerate()
    {
        $this->slug = Str::slug($this->name);
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    }

    public function GenresAdd()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $genres = new Genre();
        $genres ->name = $this->name;
        $genres ->slug = $this->slug;
        $genres ->description = $this->description;

        $genres-> save();
        session()->flash('success', 'Genre Cree avec Success');
        
        // Réinitialiser les variables après l'enregistrement
        $this->name = '';
        $this->slug = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.admin.admin-add-genres-component');
    }
}
