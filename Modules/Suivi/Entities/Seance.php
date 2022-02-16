<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function evenement_type()
    {
        return $this->belongsTo(EvenementType::class, 'evenement_type_id')->withTrashed();
    }

    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }

    // public function candidats()
    // {
    //     return $this->belongsToMany(User::class, 'seance_candidats', 'seance_id');
    // }

    public function seance_user()
    {
        return $this->hasMany(SeanceUser::class);
    }
    //coach dans le cas d'une séance "etape 3 / coding week"
    public function coach()
    {
        return $this->belongsToMany(User::class, 'seance_coach', 'seance_id');
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Suivi\Database\factories\SeanceFactory::new();
    // }
}
