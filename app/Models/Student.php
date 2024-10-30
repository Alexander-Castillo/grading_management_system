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

    // Un estudiante puede tener solo una inscripcion
    public function enrollment() {
        return $this->hasOne(Enrollment::class);
    }
}
