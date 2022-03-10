<?php

namespace Modules\Suivi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleCandidat extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "role_candidat";
    protected static function newFactory()
    {
        return \Modules\Suivi\Database\factories\RoleCandidatFactory::new();
    }
}
