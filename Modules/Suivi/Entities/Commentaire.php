<?php

namespace Modules\Suivi\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Suivi\Database\factories\CommentaireFactory::new();
    }
    public function auteur() {
        return $this->belongsTo(User::class);
    }
    public function candidat() {
        return $this->belongsTo(Candidat::class);
    }
}
