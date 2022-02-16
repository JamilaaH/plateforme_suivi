<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeanceCoach extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table="seance_coach";
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Suivi\Database\factories\SeanceCoachFactory::new();
    // }
}
