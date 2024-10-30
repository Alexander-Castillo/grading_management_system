<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Enrollment;
use App\Models\Section;
use App\Models\Specialities;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Método para mostrar la vista de inscripción de estudiante
    public function createEnrollment($studentId){
        $student = Student::findOrFail($studentId);
        $careers = Career::all();
        $specialities = []; // inicializar vacio
        $sections = []; // inicializar vacio
        return view('admin.enrollments.create', compact('student', 'careers','specialities','sections'));
    }
    // metodo para obtener las especialidades basadas en la carrera seleccionada
    public function getEspecialities(Request $request){
        $request->validate(['career_id' => 'required|exists:careers,id']);
        $specialities = Specialities::where('career_id', $request->career_id)->get();
        return response()->json($specialities);
    }
    // metodo para obtener las secciones basadas en la especialidad seleccionada
    public function getSections(Request $request){
        $request->validate(['specialities_id' => 'required|exists:specialities,id']);
        $sections = Section::where('specialities_id', $request->specialities_id)->where();
        return response()->json($sections);
    }
    // Método para registrar la inscripción de estudiante en carrera y especialidad
    public function enrollInCareerAndSpeciality(Request $request){
        // validacion de datos
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'career_id' => 'required|exists:careers,id',
            'specialities_id' => 'required|exists:specialities,id',
            'section_id' => 'required|array',
            'section_id.*' => 'exists:sections,id',
        ]);
        // Validar que el estudiante no esté ya inscrito en la misma carrera y especialidad
    $existingEnrollment = Enrollment::where([
        'student_id' => $request->student_id,
        'career_id' => $request->career_id,
        'specialities_id' => $request->specialities_id,
    ])->first();

    if ($existingEnrollment) {
        return redirect()->back()->withErrors(['msg' => 'El estudiante ya está inscrito en esta carrera y especialidad.']);
    }
        // registrar en enrollments
        Enrollment::create([
            'student_id' => $request->student_id,
            'career_id' => $request->career_id,
            'specialties_id' => $request->specialties_id,
            'section_id' => $request->section_id[0], // solo un id para la seccion asumiendo que solo se permita un registro
        ]);
        return redirect()->route('admin.student.index')->with('success', 'Inscripción realizada exitosamente');
    }
}
