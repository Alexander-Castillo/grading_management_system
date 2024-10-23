<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialities extends Model
{
    use HasFactory;
    protected $tabla = 'specialities';

    # una especialidad puede tener muchas secciones
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'specialities_id');
    }
}
