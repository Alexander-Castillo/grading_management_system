<?php

namespace App\Http\Controllers;

use App\Interfaces\GradeCalculatorInterface as InterfacesGradeCalculatorInterface;
use App\Models\Activities;
use App\Models\Student;
use App\Models\SubmissionCriteiaGrades;
use App\Models\Submissions;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    protected $gradeCalculator;

    public function __construct(InterfacesGradeCalculatorInterface $gradeCalculator)
    {
        $this->gradeCalculator = $gradeCalculator;
    }
    public function showStudents(Activities $activity)
    {
        // Obtener los estudiantes que tienen entregas para la actividad específica
    $students = Student::whereHas('submissions', function ($query) use ($activity) {
        $query->where('activity_id', $activity->id);
    })->with('submissions')->get();

    return view('teacher.activities.students', compact('activity', 'students'));
    }
    public function showSubmission($submissionId)
    {
        $submission = Submissions::with('activity.criteria')->findOrFail($submissionId);
        return view('teacher.submissions.grade_submission', compact('submission'));
    }

    public function gradeSubmission(Request $request, $submissionId)
    {
        $submission = Submissions::findOrFail($submissionId);

        foreach ($request->input('grades') as $criteriaId => $grade) {
            SubmissionCriteiaGrades::create([
                'submission_id' => $submission->id,
                'criteria_id' => $criteriaId,
                'grade' => $grade,
            ]);
        }

        $finalGrade = $this->gradeCalculator->calculateFinalGrade($submission);
        $submission->update(['grade' => $finalGrade, 'is_graded' => true]);

        return redirect()->back()->with('success', 'Calificación guardada correctamente.');
    }
}
