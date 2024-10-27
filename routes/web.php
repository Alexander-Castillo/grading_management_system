<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
    Route::get('/admin/teachers', [AdminController::class, 'showTeacherList'])->name('admin.teacher.index');
    Route::get('/admin/students', [AdminController::class, 'showStudentList'])->name('admin.student.index');
    //Route::get('/admin/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    /********************************************************************************************************************/
    Route::get('/admin/students/{id}', [StudentController::class, 'show'])->name('students.show');
});



// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
