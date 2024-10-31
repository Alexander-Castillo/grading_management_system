@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <h1>Mis Actividades</h1>

    @if ($activities->isEmpty())
    <p>No tienes actividades creadas.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>Nombre de Actividad</th>
                <th>Descripción</th>
                <th>Fecha de Entrega</th>
                <th>fecha extendida</th>
                <th>Porcentaje de Actividad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->activity_name }}</td>
                <td>{{ $activity->activity_description }}</td>
                <td>{{ $activity->due_date }}</td>
                <td>{{ $activity->new_due_date }}</td>
                <td>{{ $activity->activity_percent }}%</td>
                <td>
                    <a href="{{ route('activities.editActivity', $activity->id) }}">Editar</a>
                    <a href="{{ route('activities.edit', $activity->id) }}">extenter fecha de entrega</a>
                    <a href="{{ route('activities.show', $activity->id) }}">Informacion</a>
                    <a href="{{ route('activities.students', $activity->id) }}">Ver Estudiantes</a><!-- Ruta para ver estudiantes -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <a href="{{ route('activities.create') }}">Agregar Actividad</a>
</div> --}}

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
            </tr>
            </thead>
            <tbody >
            @foreach ($activities as $activity)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $activity->activity_name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $activity->activity_description }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $activity->due_date }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $activity->new_due_date }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $activity->activity_percent }}%</td>
                </tr>
                <tr >
                    <td colspan="5" class="py-2 px-4 border-b border-gray-200 text-center space-x-2 ">
                        <a href="{{ route('activities.editActivity', $activity->id) }}" class="btn bg-blue-300 text-black py-1 px-3 rounded hover:bg-green-500">Editar</a>
                        <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-primary bg-blue-300 text-black py-1 px-3 rounded hover:hover:bg-green-500">Extender Entrega</a>
                        <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary bg-blue-300 text-black py-1 px-3 rounded hover:bg-green-500">Información</a>
                        <a href="{{ route('activities.students', $activity->id) }}" class="btn btn-primary bg-blue-300 text-black py-1 px-3 rounded hover:bg-green-500">Ver Estudiantes</a>
                    </td>
                </tr>
            
            @endforeach
            </tbody>
        </table>
            
        </table>
    @endif
    <div class="mt-6">
        <a href="{{ route('activities.create') }}" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 mt-4">Agregar Actividad</a>
    </div>
    
</div>


@endsection