<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Section;
use App\Models\Specialities;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        // recuperamos los datos a mostrar en los select
        $careers = Career::all();
        $subjects = Subject::all();
        $sections = Section::all();
        return view('students.create', compact('careers','subjects','sections'));
    }
    public function show(Student $student){
        // Cargar los datos del estudiante y sus inscripciones
    $student->load('enrollments.career.specialities', 'enrollments.section.subjects');
        return view('admin.student.show', compact('student'));
    }
    public function store(Request $request){
        // validacion de datos que recibiremos por request
        $request->validate([
            // validacion de datos
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'carnet' => 'required|string|unique:students,carnet',
            'student_birth_date' => 'required|date',
        ]);
        // creamos un usuario
        $estudiante = $request->first_name .' '. $request->last_name;
        $user = User::create([
            'name' => $estudiante,
            'email' => $request->email,
            'role' => 'student',
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
        ]);
        // creamos el estudiante
        Student::create([
            'user_id' => $user->id,
            'carnet' => $request->carnet,
            'student_birth_date' => $request->student_birth_date,
            'is_active' => true, // por defecto
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Estudiante creado exitosamente');
    }
}
