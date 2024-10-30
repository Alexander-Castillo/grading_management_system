@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Detalles del Docente</h1>

    <table class="w-full mb-6 border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-4 text-left text-gray-600 font-semibold border-b">Campo</th>
                <th class="p-4 text-left text-gray-600 font-semibold border-b">Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-4 border-b"><strong>Nombre:</strong></td>
                <td class="p-4 border-b">{{ $teacher->user->name }}</td>
            </tr>
            <tr>
                <td class="p-4 border-b"><strong>Email:</strong></td>
                <td class="p-4 border-b">{{ $teacher->user->email }}</td>
            </tr>
            <tr>
                <td class="p-4 border-b"><strong>Escalafón:</strong></td>
                <td class="p-4 border-b">{{ $teacher->escalafon }}</td>
            </tr>
            <tr>
                <td class="p-4 border-b"><strong>Fecha de Nacimiento:</strong></td>
                <td class="p-4 border-b">{{ $teacher->teacher_birthdate }}</td>
            </tr>
            <tr>
                <td class="p-4 border-b"><strong>Teléfono:</strong></td>
                <td class="p-4 border-b">{{ $teacher->teacher_phone_number }}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="text-xl font-semibold mb-4 text-center">Secciones y Materias</h2>
    <table class="w-full mb-6 border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-4 text-left text-gray-600 font-semibold border-b">Sección</th>
                <th class="p-4 text-left text-gray-600 font-semibold border-b">Materias</th>
            </tr>
        </thead>
        <tbody>
            @if($teacher->sections->isEmpty())
                <tr>
                    <td colspan="2" class="p-4 text-center text-gray-500">No hay secciones asignadas.</td>
                </tr>
            @else
                @foreach($teacher->sections->unique('id') as $section)
                    <tr>
                        <td class="p-4 border-b">{{ $section->section_name }}</td>
                        <td class="p-4 border-b">
                            <ul class="list-disc list-inside">
                                @foreach($section->subjects as $subject)
                                    <li>{{ $subject->subject_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>



    <a href="{{ route('admin.teachers') }}">Regresar a la lista de docentes</a>
@endsection
