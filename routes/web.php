<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Ruta del dashboard (solo para usuarios autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas para perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para administrar usuarios (solo para usuarios con permisos de administrador)
    //Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/teachers', [AdminController::class, 'showTeacherList'])->name('admin.teachers');
    Route::get('/admin/students', [AdminController::class, 'showStudentList'])->name('admin.students');
    //Route::get('/admin/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::resource('teachers', TeacherController::class);
    // Rutas de recurso para estudiantes
    Route::resource('students', StudentController::class);
    /********************************************************************************************************************/

    /********************************************************************************************************************/
    Route::post('/enrollments/student', [EnrollmentController::class, 'enrollStudent'])->name('enrollments.student');
    Route::post('/enrollments/subjects', [EnrollmentController::class, 'enrollInSubjects'])->name('enrollments.subjects');
    Route::get('/enrollments/student', [EnrollmentController::class, 'showEnrollStudentForm'])->name('enrollments.showStudentForm');
    Route::get('/enrollments/subjects/{studentId}', [EnrollmentController::class, 'showEnrollSubjectsForm'])->name('enrollments.showSubjectsForm');
});



// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
