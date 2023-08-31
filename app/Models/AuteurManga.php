<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuteurManga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'cover_image', 'featured', 'user_id'
    ];

    // Relation avec l'utilisateur (auteur)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
