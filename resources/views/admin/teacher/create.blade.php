@extends('layouts.app')
@section('content')
<h1>
    Registrar un nuevo Docente
</h1>
<form action="{{ route('teachers.store') }}" method="POST">
    @csrf
    <div>
        <label for="first_name">Nombre del docente:</label>
        <input type="text" name="first_name" required>
    </div>
    <div>
        <label for="last_name">Apellidos del docente:</label>
        <input type="text" name="last_name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="escalafon">Escalafon:</label>
        <input type="text" name="escalafon" required>
    </div>
    <div>
        <label for="teacher_birthdate">fecha de nacimiento:</label>
        <input type="date" name="teacher_birthdate" required>
    </div>
    <div>
        <label for="teacher_phone_number">contacto telefonico:</label>
        <input type="text" name="teacher_phone_number" required>
    </div>
    <div>
    <label for="sections">Asignar secciones:</label>
    <select name="section_id[]" multiple required>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="subjects">asignar Materias:</label>
    <select name="subject_id[]" multiple required>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
        @endforeach
    </select>
</div>
    <button type="submit">Registrar docente</button>
</form>
@endsection
