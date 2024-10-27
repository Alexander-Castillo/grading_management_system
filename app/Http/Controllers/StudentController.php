<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Enrollment;
use App\Models\EnrollmentSections;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    
    public function show($id)
{
    // Obtener la información completa del estudiante
    $student = Student::with([
        'user', 
        'enrollment.career', 
        'enrollment.speciality', 
        'enrollment.sections.section.subjects',
        'enrollment.sections.section.teachers.user' // Para cargar los docentes
    ])
    ->findOrFail($id);

    return view('admin.student.show', compact('student'));
}



    public function create(){
        //cargar carreras y especialidades para los selects
        $careers = Career::all();

        return view('admin.student.create', compact('careers'));
    }

    public function store(Request $request){
        //validacion de datos a recibir
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'carnet' => 'required|string|unique:students',
            'student_birthdate' => 'required|date',
            'career_id' => 'required|exists:careers,id',
            'specialities_id' => 'required|exists:specialities,id',
            'section_ids' => 'required|array', //para las secciones seleccionadas 
        ]);
        $nombre = $request->first_name . ' ' . $request->last_name;
        // crear el usuario
        $user = User::create([
            'name' => $nombre,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'role' => 'student', //rol predefinido
        ]);
        // creando el estudiante
        $student = Student::create([
            'user_id' => $user->id,
            'carnet' => $request->carnet,
            'student_birthdate' => $request->student_birthdate,
            'is_active' => true, // por defecto
        ]);
        // creando la inscripcion 
        $enrollment = Enrollment::create([
            'student_id' => $student->id,
            'career_id' => $request->career_id,
            'specialities_id' => $request->specialities_id,
        ]);
        // insertar en enrollment_sections
        foreach ($request->section_ids as $section_id){
            EnrollmentSections::create([
                'enrollment_id' => $enrollment->id,
                'section_id' => $section_id,
            ]);
        }
        return redirect()->route('admin.student.index')->with('success', 'Estudiante creado correctamente');
    }
}
