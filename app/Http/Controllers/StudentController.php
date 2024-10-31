<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\User;
use App\Models\Career;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\EnrollmentSections;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    
    public function show($id)
{
    // Obtener al estudiante junto con las relaciones necesarias
    $student = Student::with([
        'user', 
        'enrollment.career', 
        'enrollment.speciality', 
        'enrollment.sections.section' => function ($query) use ($id) {
            $query->whereHas('subjects', function ($q) use ($id) {
                // Filtramos por la especialidad del estudiante
                $student = Student::findOrFail($id);
                $q->where('speciality_id', $student->enrollment->speciality->id);
            });
        },
        'enrollment.sections.section.teachers.user' // Cargar los docentes
    ])->findOrFail($id);

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
            'speciality_id' => 'required|exists:specialities,id',
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
            'speciality_id' => $request->speciality_id,
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
    public function dashboard()
{
    $student = Auth::user()->student;
    $activities = Activities::whereHas('sections.students', function ($query) use ($student) {
        $query->where('student_id', $student->id);
    })->get();

    return view('dashboard', compact('activities'));
}
public function actividad(){
    $actividad = Activities::whereHas('teachers', function ($query) use ($teachers){
        $query->where('teachers_id', $teachers->id);
    })->get();
}
}
