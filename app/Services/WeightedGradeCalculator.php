<?php
namespace App\Services;

use App\Interfaces\GradeCalculatorInterface as InterfacesGradeCalculatorInterface;
use App\Models\Submissions;
use Illuminate\Support\Facades\DB;

class WeightedGradeCalculator implements InterfacesGradeCalculatorInterface
{
    public function calculateFinalGrade(Submissions $submission): float
    {
        return $submission->criteriaGrades()
            ->join('criteria', 'criteria.id', '=', 'submission_criteria_grades.criteria_id')
            ->where('submission_criteria_grades.submission_id', $submission->id)
            ->sum(DB::raw('submission_criteria_grades.grade * criteria.criterion_percent / 100'));
    }
}