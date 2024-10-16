<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    protected $table = 'grades';
    # un estudiante puede tener varias calificaciones a actividades y criterios
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function activity(){
        return $this->belongsTo(Activities::class, 'activity_id');
    }
    public function criterion(){
        return $this->belongsTo(Criteria::class, 'criterion_id');
    }
}