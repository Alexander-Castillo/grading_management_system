<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'criteria';
    # un criterio pertenece a una actividad
    public function activity(){
        return $this->belongsTo(Activities::class, 'activity_id');
    }
}
