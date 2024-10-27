<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';
    protected $fillable = [
        'student_id',
        'career_id',
        'specialities_id',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function career(){
        return $this->belongsTo(Career::class);
    }
    public function speciality(){
        return $this->belongsTo(Speciality::class, 'specialities_id');
    }
    public function sections(){
        return $this->hasMany(EnrollmentSections::class, 'enrollment_id');
    }
}
