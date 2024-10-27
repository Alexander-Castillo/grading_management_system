<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentSections extends Model
{
    use HasFactory;
    protected $table = 'enrollment_sections';
    protected $fillable = [
        'enrollment_id',
        'section_id',
    ];
    public function enrollment(){
        return $this->belongsTo(Enrollment::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
