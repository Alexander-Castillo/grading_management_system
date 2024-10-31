@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calificar Actividad: {{ $activity->activity_name }}</h1>
    <p><strong>Materia:</strong> {{ $activity->subject->subject_name }}</p>
    <p><strong>Descripción:</strong> {{ $activity->activity_description }}</p>
    <p><strong>Porcentaje de la Actividad:</strong> {{ $activity->activity_percent }}%</p>
    <p><strong>Estudiante:</strong> {{ $student->user->name }}</p>

    <form action="{{ route('submission.grade', [$activity->id, $student->id]) }}" method="POST">
        @csrf

        @foreach ($criteria as $criterion)
            <div class="form-group">
                <label>{{ $criterion->criterion_name }} ({{ $criterion->criterion_percent }}%)</label>
                <input type="number" name="grades[{{ $criterion->id }}]" class="form-control" step="0.01" min="0" max="100" required>
            </div>
        @endforeach

        <div class="form-group">
            <label>Total Grade:</label>
            <input type="number" name="total_grade" id="total_grade" class="form-control" step="0.01" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Calificar</button>
    </form>
</div>

<script>
    document.querySelectorAll('input[name^="grades"]').forEach(input => {
        input.addEventListener('input', calculateTotalGrade);
    });

    function calculateTotalGrade() {
        let totalGrade = 0;
        document.querySelectorAll('input[name^="grades"]').forEach(input => {
            let percentage = parseFloat(input.closest('.form-group').querySelector('label').innerText.match(/(\d+)%/)[1]);
            totalGrade += (parseFloat(input.value) || 0) * (percentage / 100);
        });
        document.getElementById('total_grade').value = totalGrade.toFixed(2);
    }
</script>
@endsection
