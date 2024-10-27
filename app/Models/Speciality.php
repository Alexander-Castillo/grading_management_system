<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $tabla = 'specialities';
    protected $fillable = [
        'specialty_name',
        'description',
    ];
    public function career(){
        return $this->belongsTo(Career::class);
    }
    public function careers()
    {
        return $this->belongsToMany(Career::class, 'career_specialty', 'specialities_id', 'career_id');
    }
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
