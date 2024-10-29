<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'carnet',
        'student_birth_date',
        'is_active',
        'phone_number',
    ];

     // Un estudiante pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Un estudiante puede estar inscrito en varias secciones a través de la tabla de inscripciones
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }

    // Un estudiante puede estar inscrito en varias carreras a través de la tabla de inscripciones
    public function careers() {
        return $this->belongsToMany(Career::class, 'enrollments', 'student_id', 'career_id');
    }

    // Un estudiante puede estar inscrito en varias materias a través de la tabla de inscripciones
    public function subjects() {
        return $this->belongsToMany(Subject::class, 'enrollments', 'student_id', 'subject_id');
    }

    // Un estudiante puede estar inscrito en varias secciones a través de la tabla de inscripciones
    public function sections() {
        return $this->belongsToMany(Section::class, 'enrollments', 'student_id', 'section_id');
    }
}
