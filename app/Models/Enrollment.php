<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';
    protected $fillable = [
        'student_id',
        'career_id',
        'specialities_id',
        'section_id',
    ];
    // Una inscripción pertenece a un estudiante
    public function student() {
        return $this->belongsTo(Student::class);
    }

    // Una inscripción pertenece a una carrera
    public function career() {
        return $this->belongsTo(Career::class);
    }

    // Una inscripción pertenece a una materia
    public function speciality() {
        return $this->belongsTo(Specialities::class);
    }

    // Una inscripción pertenece a una sección
    public function section() {
        return $this->belongsTo(Section::class);
    }
}
