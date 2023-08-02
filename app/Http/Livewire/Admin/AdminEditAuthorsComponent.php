<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditAuthorsComponent extends Component
{
    use WithFileUploads;
    public $authors_id;

    public $nom;
    public $prenom;
    public $pseudo;
    public $numero;
    public $email;
    public $localisation;

    public function mount($authors_id)
    {
        $authors = Author::find($authors_id);
        $this->authors_id = $authors->id;
        $this->nom = $authors->nom;
        $this->prenom = $authors->prenom;
        $this->pseudo = $authors->pseudo;
        $this->numero = $authors->numero;
        $this->email = $authors->email;
        $this->localisation = $authors->localisation;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'numero' => 'required',
            'email' => 'required',
            'localisation' => 'required',
        ]);
    }

    public function AuthorsEdit()
    {
        $this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'numero' => 'required',
            'email' => 'required',
            'localisation' => 'required',
        ]);

        $authors = new Author();
        $authors -> nom = $this->nom;
        $authors -> prenom = $this->prenom;
        $authors -> pseudo = $this->pseudo;
        $authors -> numero = $this->numero;
        $authors -> email = $this->email;
        $authors -> localisation = $this->localisation;

        $authors-> save();

        session()->flash('success', 'Modification apporte avec success');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-authors-component');
    }
}
