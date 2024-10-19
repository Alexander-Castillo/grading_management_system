
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Profesores</h1>
        <a href="{{ route('admin.teachers.register') }}" class="btn btn-primary">Registrar Profesor</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Escalafón</th>
                    <th>Especialización</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->user->user_name }}</td>
                        <td>{{ $teacher->escalafon }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>{{ $teacher->birthdate }}</td>
                        <td>{{ $teacher->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
