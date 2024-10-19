<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // asegurandose que solo el admin pueda acceder
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
            // datos del usuario
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            // datos del profesor
            'escalafon' => 'required|string|unique:teachers,escalafon',
            'specialization' => 'required|string|max:90',
            'birthdate' => 'required|date',
            'phone_number' => 'required|string|unique:teachers,phone_number',
            // asignaciones
            'sections' => 'required|array',
            'sections.*' => 'integer|exists:sections,id',
            'subjects' => 'required|array',
            'subjects.*' => 'integer|exists:subjects,id',
        ];
    }
}
