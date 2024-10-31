@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection