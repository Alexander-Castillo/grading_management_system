<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $table = 'cycle';
    # un ciclo academico tiene muchos periodos
    public function periods(){
        return $this->hasMany(Period::class, 'cycle_id');
    }
}
