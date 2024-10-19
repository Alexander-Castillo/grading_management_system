<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStudentRequest;
use App\Http\Requests\RegisterTeacherRequest;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //usaremos servicios para manejar las solicitudes HTTP
    protected $userService;
    public function __construct(UserService $userService){
        //asignamos el servicio de usuarios al controlador
        $this->userService = $userService;
    }
    // Mostrar lista de profesores
    public function showTeachers()
    {
        $teachers = Teacher::with('user')->get();
        return view('admin.teachers.index', compact('teachers'));
    }
    public function showRegisterTeacherForm(){
        // Obtiene las secciones y materias desde la base de datos
        $sections = Section::all();
        $subjects = Subject::all();
        return view('admin.teachers.register');
    }
    public function registerTeacher(RegisterTeacherRequest $request){
        $validated = $request->validated();

        // extraer datos
        $userData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];
        $teacherData = [
            'escalafon' => $validated['escalafon'],
            'specialization' => $validated['specialization'],
            'birthdate' => $validated['birthdate'],
            'phone_number' => $validated['phone_number'],
        ];
        $sections = $validated['sections'];
        $subjects = $validated['subjects'];
        // registrar al usuario
        $user = $this->userService->registerTeacher($userData, $teacherData, $sections, $subjects);
        // redireccionar al usuario a la página de inicio
        return redirect()->route('admin.teachers.index')->with('success', 'Profesor registrado exitosamente.');
    }

    // Mostrar lista de estudiantes
    public function showStudents()
    {
        $students = Student::with('user')->get();
        return view('admin.students.index', compact('students'));
    }
    // Formulario de registro de estudiante
    public function showRegisterStudentForm()
    {
        return view('admin.students.register');
    }

    // registro de estudiantes
    public function registerStudent(RegisterStudentRequest $request){
        $validated = $request->validated();
        // extraemos los datos de usuarios
        $userData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];
        // datos del estudiante
        $studentData = [
            'carnet' => $validated['carnet'],
            'birthdate' => $validated['birthdate'],
            'is_active' => $validated['is_active'] ?? true,
            'phone_number' => $validated['phone_number'],
        ];
        // datos de inscripcion
        $enrollments = $validated['enrollments']; // Array con career_id, subject_id, section_id
        // registrar al usuario
        $user = $this->userService->registerStudent($userData, $studentData, $enrollments);
        // redireccionar al usuario a la página de inicio
        return redirect()->route('admin.students.index')->with('success', 'Estudiante registrado exitosamente.');
    }
}