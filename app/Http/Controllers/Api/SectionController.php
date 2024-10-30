<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getBySpecialityAndCareer($specialityId)
    {
        // Obtener secciones que tienen materias relacionadas con la especialidad
    $sections = Section::whereHas('subjects', function ($query) use ($specialityId) {
        $query->where('speciality_id', $specialityId);
    })
    ->whereHas('teachers')
    ->with(['subjects', 'teachers.user']) // Asegurarse de cargar los usuarios de los docentes
    ->get();

    return response()->json($sections);
    }
}