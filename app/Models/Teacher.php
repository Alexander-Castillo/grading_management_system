<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'user_id',
        'escalafon',
        'specialization',
        'birthdate',
        'phone_number',
    ];

    # un maestro pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    # un maestro puede impartir varias secciones (sections)
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section_subject');
    }

    # un maestro puede impartir varias materias (subjects)
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_section_subject');
    }
}
