<?php

namespace App\Http\Livewire\Admin;

use App\Models\Author;
use Livewire\Component;

class AdminAddAuthorsComponent extends Component
{
    public $nom;
    public $prenom;
    public $pseudo;
    public $numero;
    public $email;
    public $localisation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'email' => 'required',
            'numero' => 'required',
            'localisation' => 'required'
        ]);
    }

    public function AuthorsAdd()
    {
        $this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'email' => 'required',
            'numero' => 'required',
            'localisation' => 'required'
        ]);

        $authors = new Author();
        $authors->nom = $this->nom;
        $authors->prenom = $this->prenom;
        $authors->pseudo = $this->pseudo;
        $authors->numero = $this->numero;
        $authors->email = $this->email;
        $authors->localisation = $this->localisation;

        $authors->save();

        return redirect()->back()->with('success', 'Auteur ajouter avec success');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-authors-component');
    }
}
