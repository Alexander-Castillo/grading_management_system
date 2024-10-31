<?php
namespace App\Services;

use App\Models\Activities;
use App\Models\Criteria;
use Illuminate\Support\Facades\Auth;

class ActivityService
{
    public function createActivity(array $data): Activities
    {
        $teacher = Auth::user()->teacher;
        
        $activity = Activities::create([
            'subject_id' => $data['subject_id'],
            'activity_name' => $data['activity_name'],
            'activity_description' => $data['activity_description'],
            'due_date' => $data['due_date'],
            'new_due_date' => $data['new_due_date'] ?? null,
            'activity_percent' => $data['activity_percent'],
            'total_grade' => 0,
            'teacher_id' => $teacher->id,
        ]);

        foreach ($data['criteria'] as $criterion) {
            Criteria::create([
                'activity_id' => $activity->id,
                'criterion_name' => $criterion['criterion_name'],
                'criterion_percent' => $criterion['criterion_percent'],
            ]);
        }

        return $activity;
    }

    public function updateActivity(array $data, Activities $activity): void
    {
        $activity->update([
            'subject_id' => $data['subject_id'],
            'activity_name' => $data['activity_name'],
            'activity_description' => $data['activity_description'],
            'due_date' => $data['due_date'],
            'activity_percent' => $data['activity_percent'],
        ]);

        foreach ($data['criteria'] as $criterionData) {
            $criterion = Criteria::findOrFail($criterionData['id']);
            $criterion->update([
                'criterion_name' => $criterionData['criterion_name'],
                'criterion_percent' => $criterionData['criterion_percent'],
            ]);
        }
    }
}
