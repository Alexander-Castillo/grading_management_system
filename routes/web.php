<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('auth.login');
});

// Rutas para Admin
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/teachers', [AdminController::class, 'showTeacherList'])->name('admin.teacher.index');
    Route::get('/admin/students', [AdminController::class, 'showStudentList'])->name('admin.student.index');
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
});

// Rutas para Teachers
Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {
    Route::get('/teacher/students', [TeacherController::class, 'showStudentsForTeacher'])->name('teacher.students');
    Route::get('/activities/index', [ActivitiesController::class, 'index'])->name('activities.index');
    Route::get('/activities/show/{id}', [ActivitiesController::class, 'show'])->name('activities.show');
    Route::get('/activities/create', [ActivitiesController::class, 'create'])->name('activities.create');
    Route::post('/activities/store', [ActivitiesController::class, 'store'])->name('activities.store');
    Route::get('/activities/{id}/edit', [ActivitiesController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{id}/update', [ActivitiesController::class, 'update'])->name('activities.update');
    Route::get('/activities/{id}', [ActivitiesController::class, 'editActivity'])->name('activities.editActivity');
    Route::put('/activities/{id}', [ActivitiesController::class, 'activityUpdate'])->name('activities.activityUpdate');
    Route::get('/activities/{activity}/students', [GradesController::class, 'showStudents'])->name('activities.students'); // Muestra estudiantes en la actividad
    Route::get('/activities/{activity}/students/{student}/submission', [SubmissionsController::class, 'showSubmission'])->name('submission.show'); // Muestra la tarea subida
    Route::post('/activities/{activity}/students/{student}/grade', [GradesController::class, 'gradeSubmission'])->name('submission.grade'); // Califica la tarea del estudiante
});

// Rutas para Students
Route::middleware(['auth', RoleMiddleware::class . ':student'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
