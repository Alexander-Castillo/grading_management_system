@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Información del Docente</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre del docente</th>
                <th>Email</th>
                <th>Escalafon</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $teacher->user->name }}</td>
                <td>{{ $teacher->user->email }}</td>
                <td>{{ $teacher->escalafon }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Secciones y Materias que Imparte</h3>
    <table>
        <thead>
            <tr>
                <th>Sección</th>
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td>{{ $section->section_name }}</td>
                    <td>
                        <ul>
                            @foreach($section->subjects as $subject)
                                <li>{{ $subject->subject_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Listado de Estudiantes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre del Estudiante</th>
                <th>Email</th>
                <th>Carnet</th>
                <th>Sección</th>
                <th>Especialidad</th>
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->student_email }}</td>
                    <td>{{ $student->carnet }}</td>
                    <td>{{ $student->section_name }}</td>
                    <td>{{ $student->speciality_name }}</td>
                    <td>{{ $student->subject_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('activities.create') }}">Add Activity</a>
</div>
@endsection

