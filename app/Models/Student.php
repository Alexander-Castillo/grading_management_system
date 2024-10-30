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
        'student_birthdate',
        'is_active',
    ];

     // Un estudiante pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Un estudiante puede estar inscrito en varias secciones a través de la tabla de inscripciones
    public function enrollments() {
        return $this->hasOne(Enrollment::class);
    }

    // Un estudiante puede estar inscrito en varias carreras a través de la tabla de inscripciones
    public function career() {
        return $this->hasOneThrough(Career::class, Enrollment::class);
    }

    public function speciality()
    {
        return $this->hasOneThrough(Specialities::class, Enrollment::class);
    }
}
