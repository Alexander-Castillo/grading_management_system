<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = [
        'section_name'
    ];
    // --------------------------------------------------------------------------------------------------------------------//
    #relaciones con docentes
    // Relación muchos a muchos con Subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'sections_subjects_teacher', 'section_id', 'subject_id');
    }
     // Relación muchos a muchos con Teachers
    public function teachers() {
        return $this->belongsToMany(Teacher::class, 'sections_subjects_teacher', 'section_id', 'teacher_id');
    }
// --------------------------------------------------------------------------------------------------------------------//
}
