<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Suivi\Database\factories\GenreFactory::new();
    }
    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
}
