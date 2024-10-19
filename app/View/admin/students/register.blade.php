<!-- resources/views/admin/students/register.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Estudiante</h1>

        <form method="POST" action="{{ route('admin.students.register.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="carnet" class="form-label">Carnet</label>
                <input type="text" name="carnet" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="birthdate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Teléfono</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
@endsection
