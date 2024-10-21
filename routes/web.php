<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;

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
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/teachers', [AdminController::class, 'showTeacherList'])->name('admin.index');
    //Route::get('/admin/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::resource('teachers', TeacherController::class);

    /********************************************************************************************************************/
    Route::get('/admin/students', [AdminController::class, 'showStudentList'])->name('admin.students');
});
Route::get('/inicio', function () {
    return Inertia::render('Inicio');
});



// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
