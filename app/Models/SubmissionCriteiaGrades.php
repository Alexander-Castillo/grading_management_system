<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionCriteiaGrades extends Model
{
    use HasFactory;
    protected $table ='submission_criteria_grades';
    protected $fillable = [
        'submission_id',
        'criteria_id',
        'grade',
    ];
    public function submission(){
        return $this->belongsTo(Submissions::class);
    }
    public function criteria(){
        return $this->belongsTo(Criteria::class);
    }
}
