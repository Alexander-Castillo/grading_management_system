<?php
namespace App\Interfaces;
use App\Models\Submissions;

interface GradeCalculatorInterface
{
    public function calculateFinalGrade(Submissions $submission): float;
}

