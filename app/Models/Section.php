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
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section_subject');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_section_subject');
    }
}
