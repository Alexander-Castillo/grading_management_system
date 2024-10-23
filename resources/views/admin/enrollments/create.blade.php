@extends('layouts.app')
@section('content')
<h2>Inscripcion del Estudiante</h2>
<h3>Datos del Estudiante: {{ $student->user->name }}</h3>
<h3>Carnet del Estudiante: {{ $student->carnet }}</h3>
<form action="{{ route('enrollments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">

    <label for="career_id">Carrera:</label>
    <select name="career_id" id="career_id" required>
        @foreach($careers as $career)
            <option value="{{ $career->id }}">{{ $career->career_name }}</option>
        @endforeach
    </select>
</form>
@endsection