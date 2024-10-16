<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    use HasFactory;
    protected $table = 'submissions';
    #una entrega pertenece a un estudiante
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    #una entrega pertenece a una actividad
    public function activity(){
        return $this->belongsTo(Activities::class, 'activity_id');
    }
}
