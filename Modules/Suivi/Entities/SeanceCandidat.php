<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeanceCandidat extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        "seance_id",
        "user_id",
        "presence",
        "inscrit",
    ];
    
    protected static function newFactory()
    {
        return \Modules\Suivi\Database\factories\SeanceCandidatFactory::new();
    }
    public function candidat(){
        return $this->belongsTo(Candidat::class);
    }

    public function seance(){
        return $this->belongsTo(Seance::class);
    }

}
