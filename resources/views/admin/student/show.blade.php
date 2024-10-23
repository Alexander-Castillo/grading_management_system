@extends('layouts.app')

@section('content')
<h1>Detalles del Estudiante</h1>
<table>
    <thead>
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <tr>
            <td>Nombre del Estudiante:</td>
            <td>{{ $student->user->name }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $student->user->email }}</td>
        </tr>
        <tr>
            <td>Numero de Carnet:</td>
            <td>{{ $student->carnet }}</td>
        </tr>
        <tr>
            <td><strong>Estado:</strong></td>
            <td>{{ $student->is_active ? 'Activo' : 'Inactivo' }}</td>
        </tr>
        <tr>
            <td><strong>Fecha de Nacimiento:</strong></td>
            <td>{{ $student->student_birth_date }}</td>
        </tr>
        </tr>
    </tbody>
</table>
<h2>Secciones y Materias</h2>
<table>
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Especialidad</th>
            <th>Sección</th>
            <th>Materias</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student->enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->career->career_name }}</td>
                <td>
                    @foreach($enrollment->career->specialities as $speciality)
                        {{ $speciality->specialty_name }} 
                    @endforeach
                </td>
                <td>{{ $enrollment->section->section_name }}</td>
                <td>
                    <ul>
                        @foreach($enrollment->section->subjects as $subject)
                            <li>{{ $subject->subject_name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection