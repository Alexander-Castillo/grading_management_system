@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Actividad: {{ $activity->activity_name }}</h1>

    <form action="{{ route('activities.activityUpdate', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="subject_id">Materia:</label>
            <select name="subject_id" required>
            @foreach($sectionsSubjects as $section)
                    @foreach($section->subjects as $subject)
                        <option value="{{ $subject->id }}"{{ (int) $subject->id === (int) $activity->subject_id ? 'selected' : '' }}>
                            {{ $subject->subject_name }} (Section: {{ $section->section_name }})
                        </option>
                    @endforeach
                @endforeach
</select>

        </div>

        <div>
            <label for="activity_name">Nombre de Actividad:</label>
            <input type="text" name="activity_name" value="{{ $activity->activity_name }}" required>
        </div>

        <div>
            <label for="activity_description">Descripción:</label>
            <textarea name="activity_description">{{ $activity->activity_description }}</textarea>
        </div>

        <div>
            <label for="due_date">Fecha de Entrega:</label>
            <input type="date" name="due_date" value="{{ $activity->due_date }}" required>
        </div>

        <div>
            <label for="activity_percent">Porcentaje de Actividad:</label>
            <input type="number" name="activity_percent" value="{{ $activity->activity_percent }}" min="1" max="100" required>
        </div>

        <h3>Criterios de Evaluación</h3>
        @foreach ($activity->criteria as $criterion)
            <div>
                <label for="criteria[{{ $loop->index }}][criterion_name]">Criterio:</label>
                <input type="text" name="criteria[{{ $loop->index }}][criterion_name]" value="{{ $criterion->criterion_name }}" required>
                
                <label for="criteria[{{ $loop->index }}][criterion_percent]">Porcentaje:</label>
                <input type="number" name="criteria[{{ $loop->index }}][criterion_percent]" value="{{ $criterion->criterion_percent }}" min="1" max="100" required>
                <input type="hidden" name="criteria[{{ $loop->index }}][id]" value="{{ $criterion->id }}">
            </div>
        @endforeach

        <button type="submit">Actualizar Actividad</button>
    </form>
</div>
@endsection
