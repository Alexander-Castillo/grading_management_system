@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Detalle de la Tarea Subida</h2>

    <div class="card mt-4">
        <div class="card-header bg-gray-100 p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold">Actividad: {{ $activity->activity_name }}</h3>
        </div>
        <div class="card-body p-4">
            <p class="mb-2"><strong>Estudiante:</strong> {{ $student->user->name }}</p>
            <p class="mb-2"><strong>Ruta del Archivo:</strong> 
                <a href="{{ $submission->document_path }}" target="_blank" class="text-blue-500 hover:underline">
                    Ver Tarea
                </a>
            </p>
            <p class="mb-2"><strong>Fecha de Envío:</strong> {{ $submission->created_at->format('d-m-Y H:i') }}</p>

            @if($submission->is_graded)
                <p class="mb-2"><strong>Nota:</strong> {{ $submission->grade }}</p>
            @else
                <p class="mb-2"><strong>Estado:</strong> Sin calificar</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('activities.students', $activity->id) }}" class="btn btn-secondary bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700">
            Volver a la Lista de Estudiantes
        </a>
    </div>
</div>

{{-- <div class="container">
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
</div> --}}
@endsection
