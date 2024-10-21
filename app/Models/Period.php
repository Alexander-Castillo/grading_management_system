<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = 'periods';
    # un periodo pertenece a un ciclo
    public function cycle(){
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }
    # un periodo tiene muchas actividades
    public function activities(){
        return $this->hasMany(Activities::class, 'period_id');
    }
}
