<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\SubmissionsController;


// Ruta principal
Route::get('/', function () {
    return view('welcome');
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
    Route::resource('activities', ActivitiesController::class);
    //Route::get('/activities/create', [ActivitiesController::class, 'create'])->name('activities.create');
    //Route::post('/activities/store', [ActivitiesController::class, 'store'])->name('activities.store');
});

// Rutas para Students
Route::middleware(['auth', RoleMiddleware::class . ':student'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::post('/submissions', [SubmissionsController::class, 'create'])->name('submissions.create');
});


// Cargar las rutas de autenticación predeterminadas
require __DIR__ . '/auth.php';
