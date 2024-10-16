<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';
    // # representa la relacion entre estudiantes y secciones
    // public function student(){
    //     return $this->belongsTo(Student::class, 'student_id');
    // }
    // public function section(){
    //     return $this->belongsTo(Section::class, 'section_id');
    // }
}
