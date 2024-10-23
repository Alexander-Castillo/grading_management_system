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
    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'sections_subjects_teacher', 'subject_id', 'teacher_id');
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
    // Relación muchos a muchos con Students a través de enrollments
    public function students(){
        return $this->belongsToMany(Student::class, 'enrollments', 'subject_id', 'student_id');
    }
    public function speciality()
    {
        return $this->belongsTo(Specialities::class);
    }
}
