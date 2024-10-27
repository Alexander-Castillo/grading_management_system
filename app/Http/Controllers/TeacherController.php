<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    // mostrar datos seleccionables
    public function create()
    {
        // recuperamos datos de secciones
        $sections = Section::all();
        $subjects = Subject::all();
        return view('admin.teacher.create', compact('sections', 'subjects'));
    }
    // metodo para registrar
    public function store(Request $request)
    {
        // validacion de datos
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'escalafon' => 'required|string',
            'teacher_birthdate' => 'required|date',
            'teacher_phone_number' => 'required|string',
            'section_id' => 'required|array', // Cambiar a array para permitir múltiples secciones
            'section_id.*' => 'exists:sections,id', // Validar cada sección
            'subject_id' => 'required|array', // Cambiar a array para permitir múltiples materias
            'subject_id.*' => 'exists:subjects,id', // Validar cada materia
        ]);
        $docente = $request->first_name . ' ' . $request->last_name;
        // creamos un usuario
        $user = User::create([
            'name' => $docente,
            'email' => $request->email,
            'role' => 'teacher',
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
        ]);
        // creamos el profesor
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'escalafon' => $request->escalafon,
            'teacher_birthdate' => $request->teacher_birthdate,
            'teacher_phone_number' => $request->teacher_phone_number,
        ]);
        // Relacionar el profesor con secciones y materias
        foreach ($request->section_id as $sectionId) {
            foreach ($request->subject_id as $subjectId) {
                DB::table('sections_subjects_teacher')->insert([
                    'teacher_id' => $teacher->id,
                    'section_id' => $sectionId,
                    'subject_id' => $subjectId,
                ]);
            }
        }
        // redireccionamos a lista de profesores
        return redirect()->route('admin.teacher.index')->with('success', 'Profesor creado exitosamente');
    }
    public function show(Teacher $teacher)
    {
        $sections = DB::table('sections_subjects_teacher')
        ->join('sections', 'sections.id', '=', 'sections_subjects_teacher.section_id')
        ->join('subjects', 'subjects.id', '=', 'sections_subjects_teacher.subject_id')
        ->where('sections_subjects_teacher.teacher_id', $teacher->id)
        ->select('sections.id as section_id', 'sections.section_name', 'subjects.subject_name')
        ->get()
        ->groupBy('section_id');  // Agrupamos por sección
        return view('admin.teacher.show', compact('teacher','sections'));
    }
}
