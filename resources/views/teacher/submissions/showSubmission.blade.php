@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalle de la Tarea Subida</h2>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Actividad: {{ $activity->activity_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Estudiante:</strong> {{ $student->user->name }}</p>
            <p><strong>Ruta del Archivo:</strong> 
                <a href="{{ $submission->document_path }}" target="_blank">
                    Ver Tarea
                </a>
            </p>
            <p><strong>Fecha de Envío:</strong> {{ $submission->created_at->format('d-m-Y H:i') }}</p>

            @if($submission->is_graded)
                <p><strong>Nota:</strong> {{ $submission->grade }}</p>
            @else
                <p><strong>Estado:</strong> Sin calificar</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('activities.students', $activity->id) }}" class="btn btn-secondary">
            Volver a la Lista de Estudiantes
        </a>
    </div>
</div>
@endsection
