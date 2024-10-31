@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Mis Actividades</h1>

    @if ($activities->isEmpty())
    <p class="text-gray-600">No tienes actividades creadas.</p>
    @else
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">Nombre de Actividad</th>
                <th class="py-2 px-4 border-b border-gray-200">Descripción</th>
                <th class="py-2 px-4 border-b border-gray-200">Fecha de Entrega</th>
                <th class="py-2 px-4 border-b border-gray-200">Fecha Extendida</th>
                <th class="py-2 px-4 border-b border-gray-200">Porcentaje de Actividad</th>
                <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">{{ $activity->activity_name }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $activity->activity_description }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $activity->due_date }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $activity->new_due_date }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $activity->activity_percent }}%</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <a href="{{ route('activities.editActivity', $activity->id) }}" class="text-blue-500 hover:underline">Editar</a>
                    <a href="{{ route('activities.edit', $activity->id) }}" class="text-blue-500 hover:underline">Extender Fecha de Entrega</a>
                    <a href="{{ route('activities.show', $activity->id) }}" class="text-blue-500 hover:underline">Información</a>
                    <a href="{{ route('activities.students', $activity->id) }}" class="text-blue-500 hover:underline">Ver Estudiantes</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <a href="{{ route('activities.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Agregar Actividad</a>
</div>
@endsection