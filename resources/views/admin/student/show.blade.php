@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Detalles del Estudiante</h1>

    <div class="mb-6">
        <p class="text-lg"><strong>Nombre:</strong> {{ $student->user->name }}</p>
        <p class="text-lg"><strong>Email:</strong> {{ $student->user->email }}</p>
        <p class="text-lg"><strong>Carnet:</strong> {{ $student->carnet }}</p>
        <p class="text-lg"><strong>Carrera:</strong> {{ $student->enrollment->career->career_name }}</p>
        <p class="text-lg"><strong>Especialidad:</strong> {{ $student->enrollment->speciality->speciality_name }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-4">Secciones y Materias</h2>
    <table class="w-full table-auto bg-gray-100 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Sección</th>
                <th class="py-3 px-6 text-left">Docente</th>
                <th class="py-3 px-6 text-left">Materias</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
            @foreach($student->enrollment->sections as $enrollmentSection)
                @php
                    $section = $enrollmentSection->section;
                    $teachers = $section->teachers->unique('id');
                    $subjects = $section->subjects
                        ->where('speciality_id', $student->enrollment->speciality->id)
                        ->unique('id');
                @endphp
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $section->section_name }}</td>
                    <td class="py-3 px-6">
                        <ul class="list-disc list-inside">
                            @foreach($teachers as $teacher)
                                <li>{{ $teacher->user->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="py-3 px-6">
                        <ul class="list-disc list-inside">
                            @foreach($subjects as $subject)
                                <li>{{ $subject->subject_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
   