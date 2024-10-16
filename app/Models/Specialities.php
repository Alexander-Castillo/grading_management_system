<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{
    use HasFactory;
    protected $tabla = 'specialities';

    # una especialidad puede tener muchas secciones
    public function sections(){
        return $this->hasMany(Section::class, 'specialty_id');
    }
}
