<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodGrade extends Model
{
    use HasFactory;
    protected $table = 'period_grade';
    # las calificaciones por periodo pertenecen a un estudiante, una materia y un periodo
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function period(){
        return $this->belongsTo(Period::class, 'period_id');
    }
}
