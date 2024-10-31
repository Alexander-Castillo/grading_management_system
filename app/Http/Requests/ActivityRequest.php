<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject_id' => 'required|exists:subjects,id',
            'activity_name' => 'required|string|max:255',
            'activity_description' => 'nullable|string',
            'due_date' => 'required|date',
            'activity_percent' => 'required|integer|min:1|max:100',
            'criteria.*.criterion_name' => 'required|string',
            'criteria.*.criterion_percent' => 'required|integer|min:1|max:100',
        ];
    }
}
