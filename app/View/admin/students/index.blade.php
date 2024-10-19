@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Estudiantes</h1>
        <a href="{{ route('admin.students.register') }}" class="btn btn-primary">Registrar Estudiante</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Carnet</th>
                    <th>Activo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->user->user_name }}</td>
                        <td>{{ $student->carnet }}</td>
                        <td>{{ $student->is_active ? 'Sí' : 'No' }}</td>
                        <td>{{ $student->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
