<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';

    # una materia pertenece a una especialidad
    public function teacher(){
        return $this->belongsTo(Specialities::class, 'specialty_id');
    }
    # una materia puede tener varias actividades
    public function activities(){
        return $this->hasMany(Activities::class, 'subject_id');
    }
}
