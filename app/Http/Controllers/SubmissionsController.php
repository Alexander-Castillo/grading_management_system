<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Student;
use App\Models\Submissions;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function showSubmission(Activities $activity, Student $student)
    {
        // Buscar el envío (submission) de este estudiante para esta actividad
        $submission = Submissions::where('activity_id', $activity->id)
            ->where('student_id', $student->id)
            ->first();

        // Si no hay envío, redirigir con mensaje de error
        if (!$submission) {
            return redirect()->back()->with('error', 'No se encontró el envío del estudiante.');
        }

        // Pasar datos a la vista
        return view('teacher.submissions.showSubmission', compact('submission', 'student', 'activity'));
    }
}
