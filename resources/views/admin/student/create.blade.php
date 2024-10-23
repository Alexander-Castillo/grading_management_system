@extends('layouts.app')
@section('content')
<h2>Crear Estudiante</h2>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label for="first_name">Ingresa los nombre del Estudiante:</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Ingresa los apellidos del Estudiante:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="email">Correo electronico:</label>
    <input type="email" id="email" name="email" required>

    <label for="carnet">Ingresa el Carnet del Estudiante:</label>
    <input type="text" id="carnet" name="carnet" required>

    <label for="student_birth_date">Fecha de Nacimiento:</label>
    <input type="date" id="student_birth_date" name="student_birth_date" required>

    <button type="submit">Guardar Estudiante</button>
</form>
@endsection