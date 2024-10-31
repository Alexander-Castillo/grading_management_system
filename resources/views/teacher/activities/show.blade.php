@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Detalles de Actividad: {{ $activity->activity_name }}</h1>
    <br>
    <p><strong>Materia:</strong> {{ $activity->subject->subject_name }}</p>
    <p><strong>Descripción:</strong> {{ $activity->activity_description }}</p>
    <p><strong>Fecha de Entrega:</strong> {{ $activity->due_date }}</p>
    <p><strong>Nueva Fecha de Entrega:</strong> {{ $activity->new_due_date }}</p>
    <p><strong>Porcentaje de Actividad:</strong> {{ $activity->activity_percent }}%</p>
    <br>
    <h3 class="text-xl font-semibold mb-2">Criterios de Evaluación</h3>
    <br>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Criterio</th>
                <th class="py-2 px-4 border-b border-gray-200">Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activity->criteria as $criterion)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $criterion->criterion_name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $criterion->criterion_percent }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('activities.edit', $activity->id) }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Editar Actividad</a>
</div>
@endsection
