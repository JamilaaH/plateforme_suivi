<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

    public function evenement_type()
    {
        return $this->hasMany(EvenementType::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Suivi\Database\factories\EvenementFactory::new();
    // }
}
