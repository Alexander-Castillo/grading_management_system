<form action="{{ route('gradeSubmission', $submission->id) }}" method="POST">
    @csrf
    @foreach($submission->activity->criteria as $criteria)
        <div>
            <label>{{ $criteria->name }} ({{ $criteria->percentage }}%)</label>
            <input type="number" name="grades[{{ $criteria->id }}]" max="10" min="1" required>
        </div>
    @endforeach
    <button type="submit">Submit Grades</button>
</form>
