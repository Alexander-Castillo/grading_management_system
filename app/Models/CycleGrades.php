<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleGrades extends Model
{
    use HasFactory;
    protected $table = 'cycle_grades';
    # la calificacion por ciclo pertenece a un estudiante, una materia y un ciclo
    public function cycle(){
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }
    # la calificacion por ciclo pertenece a un estudiante
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    # la calificacion por ciclo pertenece a una materia
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
