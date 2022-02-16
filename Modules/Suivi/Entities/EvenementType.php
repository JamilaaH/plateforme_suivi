<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvenementType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];

    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function classe()
    {
        return $this->hasMany(Classe::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Suivi\Database\factories\EvenementTypeFactory::new();
    // }
}
