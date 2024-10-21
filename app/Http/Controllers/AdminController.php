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
        return view('admin.index', compact('teachers'));
    }
    // mostrar listado de estudiantes
    public function showStudentList(){
        // mostrar listado de estudiantes
        $students = Student::with('user','careers','subjects','sections')->get();
        return view('admin.students', compact('students'));
    }
}