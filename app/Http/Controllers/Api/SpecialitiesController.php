<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    //
    public function getByCareer($careerId){
        // Obtener todas las especialidades relacionadas con la carrera seleccionada
        $specialities = Speciality::whereHas('careers', function ($query) use ($careerId) {
            $query->where('career_id', $careerId);
        })->get();
        return response()->json($specialities);
    }
}
