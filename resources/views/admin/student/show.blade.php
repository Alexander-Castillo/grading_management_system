@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Estudiante</h1>
    <p><strong>Nombre:</strong> {{ $student->user->name }}</p>
    <p><strong>Email:</strong> {{ $student->user->email }}</p>
    <p><strong>Carnet:</strong> {{ $student->carnet }}</p>
    <p><strong>Carrera:</strong> {{ $student->enrollment->career->career_name }}</p>
    <p><strong>Especialidad:</strong> {{ $student->enrollment->speciality->specialty_name }}</p>
    
    <h2>Secciones y Materias</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Sección</th>
                <th>Docente</th>
                <th>Materias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student->enrollment->sections as $enrollmentSection)
                @php
                    // Obtener la sección
                    $section = $enrollmentSection->section;
                    // Obtener los docentes únicos
                    $teachers = $section->teachers->unique('id');
                    // Obtener las materias únicas
                    $subjects = $section->subjects->where('specialities_id', $student->enrollment->speciality->id)->unique('id');
                @endphp
                <tr>
                    <td>{{ $section->section_name }}</td>
                    <td>
                        <ul>
                            @foreach($teachers as $teacher)
                                <li>{{ $teacher->user->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($subjects as $subject)
                                <li>{{ $subject->subject_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
