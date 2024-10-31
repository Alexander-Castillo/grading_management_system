@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Actividad: {{ $activity->activity_name }}</h1>
    <br>
    <p><strong>Materia:</strong> {{ $activity->subject->subject_name }}</p>
    <p><strong>Descripción:</strong> {{ $activity->activity_description }}</p>
    <p><strong>Fecha de Entrega:</strong> {{ $activity->due_date }}</p>
    <p><strong>Nueva Fecha de Entrega:</strong> {{ $activity->new_due_date }}</p>

    <p><strong>Porcentaje de Actividad:</strong> {{ $activity->activity_percent }}%</p>
    <br>
    <h3>Criterios de Evaluación</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>Criterio</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activity->criteria as $criterion)
                <tr>
                    <td>{{ $criterion->criterion_name }}</td>
                    <td>{{ $criterion->criterion_percent }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('activities.edit', $activity->id) }}">Editar Actividad</a>
</div>
@endsection
