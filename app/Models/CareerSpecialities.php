<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerSpecialities extends Model
{
    use HasFactory;
    protected $table = 'career_speciality';
    //desabilitando autoincrement al ser una tabla pivote
    public $incrementing = false;

    # una carrera puede estar en una o muchas especialidades
    public function specialities(){
        return $this->belongsToMany(Speciality::class, 'career_speciality');
    }
    # una especialidad puede estar en muchas carreras
    public function careers(){
        return $this->belongsToMany(Career::class, 'career_speciality');
    }
}
