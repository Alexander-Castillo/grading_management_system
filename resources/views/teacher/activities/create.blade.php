@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Activity</h2>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject_id">Subject and Section</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                <option value="">Select a Subject and Section</option>
                @foreach($sectionsSubjects as $section)
                    @foreach($section->subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->subject_name }} (Section: {{ $section->section_name }})
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="activity_name">Activity Name</label>
            <input type="text" name="activity_name" id="activity_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="activity_description">Activity Description</label>
            <textarea name="activity_description" id="activity_description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="activity_percent">Activity Percent</label>
            <input type="number" name="activity_percent" id="activity_percent" class="form-control" required min="1" max="100">
        </div>

        <h3>Criteria</h3>
        <div id="criteria-container">
            <div class="criteria-item">
                <div class="form-group">
                    <label for="criteria[0][criterion_name]">Criterion Name</label>
                    <input type="text" name="criteria[0][criterion_name]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="criteria[0][criterion_percent]">Criterion Percent</label>
                    <input type="number" name="criteria[0][criterion_percent]" class="form-control criterion-percent" required min="1" max="100">
                </div>
            </div>
        </div>

        <button type="button" id="add-criterion" class="btn btn-secondary">Add Criterion</button>

        <button type="submit" class="btn btn-primary">Create Activity</button>
    </form>
</div>

<script>
    document.getElementById('add-criterion').addEventListener('click', function () {
        const criteriaContainer = document.getElementById('criteria-container');
        const criterionCount = criteriaContainer.children.length;

        const newCriterion = document.createElement('div');
        newCriterion.classList.add('criteria-item');
        newCriterion.innerHTML = `
            <div class="form-group">
                <label for="criteria[${criterionCount}][criterion_name]">Criterion Name</label>
                <input type="text" name="criteria[${criterionCount}][criterion_name]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="criteria[${criterionCount}][criterion_percent]">Criterion Percent</label>
                <input type="number" name="criteria[${criterionCount}][criterion_percent]" class="form-control criterion-percent" required min="1" max="100">
            </div>
        `;
        criteriaContainer.appendChild(newCriterion);
    });
</script>
@endsection
