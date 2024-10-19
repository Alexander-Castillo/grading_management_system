<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // solo admin puede acceder
        return $this->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            // datos de los usuarios
            'firt_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
            // datos del estudiante
            'carnet' => 'required|string|unique:students,carnet',
            'birthdate' => 'required|date',
            'is_active' => 'boolean',
            'phone_number' => 'required|string|unique:students,phone_number',
            // inscripciones
            'enrollments' => 'required|array',
            'enrollments.*.career_id' => 'required|exists:careers,id',
            'enrollments.*.subject_id' => 'required|exists:subjects,id',
            'enrollments.*.section_id' => 'required|exists:sections,id',
        ];
    }
}
