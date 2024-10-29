<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
   
    public function create()
    {
        // recuperamos datos de secciones
        // $sections = Section::all();
        // $subjects = Subject::all();
        // return view('students.create', compact('sections', 'subjects'));
        return view('students.create'); 
    }
    //metodo para registrar
    public function store(Request $request)
    {
        // validacion de datos
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'carnet' => 'required|string',
            'student_birth_date' => 'required|date',
            'is_active' => '1'
        ]);
        $student = $request->first_name . ' ' . $request->last_name;
        // creamos un usuario
        $user = User::create([
            'name' => $student,
            'email' => $request->email,
            'role' => 'student',
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
        ]);
        // creamos el estudiante
        $student = Student::create([
            'user_id' => $user->id,
            'student_birth_date' => $request->student_birth_date,
            'carnet'=>$request->carnet,
          
            //'teacher_phone_number' => $request->teacher_phone_number,
        ]);
        // Relacionar el profesor con secciones y materias
        // foreach ($request->section_id as $sectionId) {
        //     foreach ($request->subject_id as $subjectId) {
        //         DB::table('sections_subjects_teacher')->insert([
        //             'teacher_id' => $student->id,
        //             'section_id' => $sectionId,
        //             'subject_id' => $subjectId,
        //         ]);
        //     }
        // }
        // redireccionamos a lista de profesores
        return redirect()->route('admin.students')->with('success', 'Alumno creado exitosamente');
    }
    public function show($id) {
        // Logic to fetch and return the student with the given ID
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    

}
