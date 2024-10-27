<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // mostrar listado de maestros
    public function showTeacherList(){
        // mostrar listado de maestros
        $teachers = Teacher::with('user','sections','subjects')->get();
        return view('admin.teacher.index', compact('teachers'));
    }
    // mostrar listado de estudiantes
    public function showStudentList(){
        // obtener todos los estudiantes con la informacion necesaria
        $students = Student::with([
            'user',
            'enrollment.career',
            'enrollment.speciality',
            'enrollment.sections.section.subjects'
            ])
        ->get();
        return view('admin.student.index', compact('students'));
    }
}