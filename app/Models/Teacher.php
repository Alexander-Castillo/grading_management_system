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
        'teacher_birthdate',
        'teacher_phone_number',
    ];

    # un maestro pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    # un maestro puede impartir varias secciones (sections)
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'sections_subjects_teacher', 'teacher_id', 'section_id');
    }

    # un maestro puede impartir varias materias (subjects)
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'sections_subjects_teacher', 'teacher_id', 'subject_id');
    }
}
