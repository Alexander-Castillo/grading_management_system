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
                <th>Secciones</th>
                <th>Especialidad</th>
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->user->name }}</td>
                    <td>{{ $enrollment->student->user->email }}</td>
                    <td>{{ $enrollment->student->carnet }}</td>
                    <td>
                        <ul>
                            @foreach($enrollment->sections as $section)
                                <li>{{ $section->section->section_name ?? 'No hay sección asignada' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $enrollment->speciality->speciality_name ?? 'No hay especialidad asignada' }}</td>
                    <td>
                        <ul>
                            @foreach($enrollment->sections as $section)
                                @foreach($section->section->subjects as $subject)
                                    @if($subject->speciality_id == $enrollment->speciality_id)
                                        <li>{{ $subject->subject_name }}</li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

