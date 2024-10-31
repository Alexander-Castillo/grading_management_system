<?php

namespace App\Http\Controllers;

use App\Interfaces\GradeCalculatorInterface as InterfacesGradeCalculatorInterface;
use App\Models\Activities;
use App\Models\Criteria;
use App\Models\Student;
use App\Models\SubmissionCriteiaGrades;
use App\Models\Submissions;
use App\Services\WeightedGradeCalculator;
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
    public function showGradeForm($activityId, $studentId)
{
    $activity = Activities::findOrFail($activityId); // Esto utiliza la columna 'id' en 'activities' automáticamente
    $student = Student::findOrFail($studentId);

    // Cargar los criterios de la actividad, asumiendo que están vinculados correctamente
    $criteria = Criteria::where('activity_id', $activityId)->get();

    return view('teacher.submissions.grade_form', compact('activity', 'student', 'criteria'));
}


    public function gradeSubmission(Request $request, $activityId, $studentId)
    {
        $submission = Submissions::where('activity_id', $activityId)
            ->where('student_id', $studentId)
            ->firstOrFail();

        foreach ($request->input('grades') as $criteriaId => $grade) {
            SubmissionCriteiaGrades::updateOrCreate(
                ['submission_id' => $submission->id, 'criteria_id' => $criteriaId],
                ['grade' => $grade]
            );
        }

        $finalGrade = app(WeightedGradeCalculator::class)->calculateFinalGrade($submission);
        $submission->update(['grade' => $finalGrade, 'is_graded' => true]);

        return redirect()->route('submission.show', [$activityId, $studentId])->with('success', 'Calificación guardada correctamente.');
    }
}
