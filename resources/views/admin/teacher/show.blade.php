@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Detalles del Docente</h1>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Campo</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><strong>Nombre:</strong></td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $teacher->user->name }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><strong>Email:</strong></td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $teacher->user->email }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><strong>Escalafón:</strong></td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $teacher->escalafon }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><strong>Fecha de Nacimiento:</strong></td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $teacher->teacher_birthdate }}</td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b border-gray-200"><strong>Teléfono:</strong></td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $teacher->teacher_phone_number }}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="text-xl font-semibold mt-6 mb-4 text-center">Secciones y Materias</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Sección</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Materias</th>
            </tr>
        </thead>
        <tbody>
            @if($teacher->sections->isEmpty())
                <tr>
                    <td colspan="2" class="py-2 px-4 border-b border-gray-200 text-center">No hay secciones asignadas.</td>
                </tr>
            @else
                @foreach($teacher->sections->unique('id') as $section)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $section->section_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
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

    <div class="text-center mt-6">
        <a href="{{ route('admin.teacher.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Regresar a la lista de docentes
        </a>
    </div>
</div>
@endsection
