<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultad';
    # una facultad tiene varias carreras
    public function careers(){
        return $this->hasMany(Career::class, 'facultad_id');
    }
}
