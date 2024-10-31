@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Create Activity</h2>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf

        <div class="form-group mb-4">
            <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject and Section</label>
            <select name="subject_id" id="subject_id" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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

        <div class="form-group mb-4">
            <label for="activity_name" class="block text-sm font-medium text-gray-700">Activity Name</label>
            <input type="text" name="activity_name" id="activity_name" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="form-group mb-4">
            <label for="activity_description" class="block text-sm font-medium text-gray-700">Activity Description</label>
            <textarea name="activity_description" id="activity_description" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>

        <div class="form-group mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>

        <div class="form-group mb-4">
            <label for="activity_percent" class="block text-sm font-medium text-gray-700">Activity Percent</label>
            <input type="number" name="activity_percent" id="activity_percent" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required min="1" max="100">
        </div>

        <h3 class="text-xl font-semibold mb-4">Criteria</h3>
        <div id="criteria-container">
            <div class="criteria-item mb-4">
                <div class="form-group mb-4">
                    <label for="criteria[0][criterion_name]" class="block text-sm font-medium text-gray-700">Criterion Name</label>
                    <input type="text" name="criteria[0][criterion_name]" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>

                <div class="form-group mb-4">
                    <label for="criteria[0][criterion_percent]" class="block text-sm font-medium text-gray-700">Criterion Percent</label>
                    <input type="number" name="criteria[0][criterion_percent]" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 criterion-percent" required min="1" max="100">
                </div>
            </div>
        </div>

        <button type="button" id="add-criterion" class="btn btn-secondary mb-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Add Criterion</button>

        <button type="submit" class="btn btn-primary bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Create Activity</button>
    </form>
</div>

<script>
    document.getElementById('add-criterion').addEventListener('click', function () {
        const criteriaContainer = document.getElementById('criteria-container');
        const criterionCount = criteriaContainer.children.length;

        const newCriterion = document.createElement('div');
        newCriterion.classList.add('criteria-item', 'mb-4');
        newCriterion.innerHTML = `
            <div class="form-group mb-4">
                <label for="criteria[${criterionCount}][criterion_name]" class="block text-sm font-medium text-gray-700">Criterion Name</label>
                <input type="text" name="criteria[${criterionCount}][criterion_name]" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div class="form-group mb-4">
                <label for="criteria[${criterionCount}][criterion_percent]" class="block text-sm font-medium text-gray-700">Criterion Percent</label>
                <input type="number" name="criteria[${criterionCount}][criterion_percent]" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 criterion-percent" required min="1" max="100">
            </div>
        `;
        criteriaContainer.appendChild(newCriterion);
    });
</script>
@endsection
