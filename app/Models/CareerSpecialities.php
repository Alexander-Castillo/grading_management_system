<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerSpecialities extends Model
{
    use HasFactory;
    protected $table = 'career_specialities';
    //desabilitando autoincrement al ser una tabla pivote
    public $incrementing = false;

    # una carrera puede estar en una o muchas especialidades
    public function specialities(){
        return $this->belongsToMany(Specialities::class, 'career_specialities');
    }
    # una especialidad puede estar en muchas carreras
    public function careers(){
        return $this->belongsToMany(Career::class, 'career_specialities');
    }
}
