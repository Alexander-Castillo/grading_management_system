@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Estudiantes en la Actividad: {{ $activity->activity_name }}</h1>

    @if ($students->isEmpty())
        <p class="text-gray-600">No hay estudiantes inscritos en esta actividad.</p>
    @else
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200">Nombre del Estudiante</th>
                    <th class="py-2 px-4 border-b border-gray-200">Email</th>
                    <th class="py-2 px-4 border-b border-gray-200">Entregas</th>
                    <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $student->user->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $student->user->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            @if ($student->submissions->isEmpty())
                                <span class="text-gray-600">Sin entregas</span>
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach ($student->submissions as $submission)
                                        <li>
                                            {{ $submission->title }} - 
                                            <a href="{{ route('submission.show', [$activity->id, $student->id]) }}" class="text-blue-500 hover:underline">Ver Entrega</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('submission.gradeForm', [$activity->id, $student->id]) }}">Calificar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
