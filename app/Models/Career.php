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

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
    // Relación muchos a muchos con Students a través de enrollments
    public function students() {
        return $this->belongsToMany(Student::class, 'enrollments', 'career_id', 'student_id');
    }
    public function specialities()
    {
        return $this->belongsToMany(Specialities::class, 'career_specialty');
    }
}
