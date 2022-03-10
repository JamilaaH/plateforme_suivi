<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Suivi\Database\factories\CandidatFactory::new();
    }
    public function role()
    {
        return $this->belongsTo(RoleCandidat::class);
    }
    public function inscrits(){
        return $this->belongsToMany(Seance::class , 'seance_candidats' , 'candidat_id');
    }


    public function infos()
    {
        return $this->hasOne(CandidatInfo::class);
    }

    public function seance()
    {
        return $this->belongsToMany(Seance::class, 'seance_candidats' , 'candidat_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

}
