<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'pseudo',
        'numero',
        'email',
    ];

    public function mangas()
    {
        return $this->hasMany(Manga::class);
    }
}
