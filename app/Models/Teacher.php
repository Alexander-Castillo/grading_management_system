<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';

    # un maestro pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    # un maestro puede impartir varias materias (subjects)
    public function subjects(){
        return $this->hasMany(Subject::class, 'teacher_id');
    }
}
