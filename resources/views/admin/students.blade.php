@extends('layouts.app')

@section('content')
<h1>Listado de estudiantes</h1>
<table>
    <thead>
        <tr>
            <th>N. registro</th>
            <th>Numero de Carnet</th>
            <th>Estado</th>
            <th>Nombre del Estudiante</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $index => $student)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->carnet }}</td>
                <td>{{ $student->is_active ? 'Activo' : 'Inactivo' }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->student_birth_date }}</td>
                <td>
                <table>
                    <tr>
                        <td>cambiar estado</td>
                        <td>editar</td>
                        <td>informacion</td>
                    </tr>
                </table>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection