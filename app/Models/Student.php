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
        'birthdate',
        'is_active',
        'phone_number',
    ];

    # un estudiante pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    # un estudiante puede estar inscrito en varias secciones a traves de ka tabla de inscripciones (enrollments)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
