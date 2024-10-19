<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; // Asegúrate de tener este controlador
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
});

// Grupo de rutas para el administrador (protección con middleware 'can:admin-actions')
Route::middleware(['auth', 'can:admin-actions'])->prefix('admin')->name('admin.')->group(function () {
    // Registro de profesores
    Route::get('/teachers', [UserController::class, 'showTeachers'])->name('teachers.index');
    Route::get('/teachers/register', [UserController::class, 'showRegisterTeacherForm'])->name('teachers.register');
    Route::post('/teachers/register', [UserController::class, 'registerTeacher'])->name('teachers.register.submit');

    // Registro de estudiantes
    Route::get('/students', [UserController::class, 'showStudents'])->name('students.index');
    Route::get('/students/register', [UserController::class, 'showRegisterStudentForm'])->name('students.register');
    Route::post('/students/register', [UserController::class, 'registerStudent'])->name('students.register.submit');

    // Otras rutas de administración que puedas necesitar
});

// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
