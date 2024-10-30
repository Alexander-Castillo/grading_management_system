<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = [
        'subject_id',
        'activity_name',
        'activity_description',
        'due_date',
        'new_due_date',
        'activity_percent',
        'total_grade',
    ];
    # una actividad pertenece a una materia
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    # una actividad pertenece a un periodo
    public function period(){
        return $this->belongsTo(Period::class, 'period_id');
    }
    # una actividad puede tener varios criterios de evaluacion
    public function criteria(){
        return $this->hasMany(Criteria::class, 'activity_id');
    }
}
