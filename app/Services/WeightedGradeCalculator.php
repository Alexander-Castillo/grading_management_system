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
            ->sum(DB::raw('grade * percentage / 100'));
    }
}