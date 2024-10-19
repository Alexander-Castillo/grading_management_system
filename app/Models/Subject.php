<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'specialty_id',
        'subject_name',
        'description',
    ];

    # una materia pertenece a una especialidad
    public function teacher(){
        return $this->belongsToMany(Teacher::class, 'teacher_section_subject');
    }
    # una materia puede tener varias inscripciones
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    # una materia puede tener varias actividades
    public function activities(){
        return $this->hasMany(Activities::class, 'subject_id');
    }
}
