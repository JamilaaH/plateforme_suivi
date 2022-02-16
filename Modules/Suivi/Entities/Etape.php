<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etape extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Suivi\Database\factories\EtapeFactory::new();
    // }
}
