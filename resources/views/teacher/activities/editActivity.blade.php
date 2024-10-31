@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Editar Actividad: {{ $activity->activity_name }}</h1>

    <form action="{{ route('activities.activityUpdate', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="subject_id" class="block text-sm font-medium text-gray-700">Materia:</label>
            <select name="subject_id" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @foreach($sectionsSubjects as $section)
                    @foreach($section->subjects as $subject)
                        <option value="{{ $subject->id }}"{{ (int) $subject->id === (int) $activity->subject_id ? 'selected' : '' }}>
                            {{ $subject->subject_name }} (Section: {{ $section->section_name }})
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="activity_name" class="block text-sm font-medium text-gray-700">Nombre de Actividad:</label>
            <input type="text" name="activity_name" value="{{ $activity->activity_name }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="activity_description" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <textarea name="activity_description" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $activity->activity_description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700">Fecha de Entrega:</label>
            <input type="date" name="due_date" value="{{ $activity->due_date }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="activity_percent" class="block text-sm font-medium text-gray-700">Porcentaje de Actividad:</label>
            <input type="number" name="activity_percent" value="{{ $activity->activity_percent }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" max="100" required>
        </div>

        <h3 class="text-xl font-semibold mb-4">Criterios de Evaluación</h3>
        @foreach ($activity->criteria as $criterion)
            <div class="mb-4">
                <label for="criteria[{{ $loop->index }}][criterion_name]" class="block text-sm font-medium text-gray-700">Criterio:</label>
                <input type="text" name="criteria[{{ $loop->index }}][criterion_name]" value="{{ $criterion->criterion_name }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                
                <label for="criteria[{{ $loop->index }}][criterion_percent]" class="block text-sm font-medium text-gray-700">Porcentaje:</label>
                <input type="number" name="criteria[{{ $loop->index }}][criterion_percent]" value="{{ $criterion->criterion_percent }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" max="100" required>
                <input type="hidden" name="criteria[{{ $loop->index }}][id]" value="{{ $criterion->id }}">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Actualizar Actividad</button>
    </form>
</div>
@endsection
