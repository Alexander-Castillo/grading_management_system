<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'careers';

    # una carrera puede tener multiples secciones
    public function faculty(){
        return $this->belongsTo(Facultad::class,'facultad_id');
    }
    # una carrera esta asociada con una facultad
    public function sections(){
        return $this->hasMany(Section::class. 'career_id');
    }
}
