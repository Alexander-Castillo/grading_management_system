@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Información del Docente</h2>
    <table class="min-w-full bg-white border border-gray-300 mb-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nombre del docente</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Escalafon</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b">{{ $teacher->user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $teacher->user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $teacher->escalafon }}</td>
            </tr>
        </tbody>
    </table>

    <h3 class="text-xl font-semibold mb-4">Secciones y Materias que Imparte</h3>
    <table class="min-w-full bg-white border border-gray-300 mb-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Sección</th>
                <th class="py-2 px-4 border-b">Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $section->section_name }}</td>
                    <td class="py-2 px-4 border-b">
                        <ul class="list-disc list-inside">
                            @foreach($section->subjects as $subject)
                                <li>{{ $subject->subject_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="text-2xl font-semibold mb-4">Listado de Estudiantes</h1>
    <table class="min-w-full bg-white border border-gray-300 mb-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nombre del Estudiante</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Carnet</th>
                <th class="py-2 px-4 border-b">Sección</th>
                <th class="py-2 px-4 border-b">Especialidad</th>
                <th class="py-2 px-4 border-b">Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $student->student_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->student_email }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->carnet }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->section_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->speciality_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->subject_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('activities.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">Add Activity</a>
</div>
@endsection

