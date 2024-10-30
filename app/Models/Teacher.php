<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'user_id',
        'escalafon',
        'teacher_birthdate',
        'teacher_phone_number',
    ];

    /**
     * Un maestro pertenece a un usuario.
     * Si el usuario no está asociado, se evita un error usando withDefault.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    /**
     * Un maestro puede impartir varias secciones.
     * Relación many-to-many con la tabla intermedia 'sections_subjects_teacher'.
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'sections_subjects_teacher', 'teacher_id', 'section_id')
            ->withPivot('subject_id') // Agrega campos adicionales de la tabla intermedia
            ->withTimestamps();
    }

    /**
     * Un maestro puede impartir varias materias.
     * Relación many-to-many con la tabla intermedia 'sections_subjects_teacher'.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'sections_subjects_teacher', 'teacher_id', 'subject_id')
            ->withPivot('section_id') // Agrega campos adicionales de la tabla intermedia
            ->withTimestamps();
    }
}
