@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estudiantes en la Actividad: {{ $activity->activity_name }}</h1>

    @if ($students->isEmpty())
        <p>No hay estudiantes inscritos en esta actividad.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Estudiante</th>
                    <th>Email</th>
                    <th>Entregas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>
                            @if ($student->submissions->isEmpty())
                                Sin entregas
                            @else
                                <ul>
                                    @foreach ($student->submissions as $submission)
                                        <li>
                                            {{ $submission->title }} - 
                                            <a href="{{ route('submission.show', [$activity->id, $student->id]) }}">Ver Entrega</a>
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
