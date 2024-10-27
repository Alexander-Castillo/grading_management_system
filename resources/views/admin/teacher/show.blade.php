@extends('layouts.app')

@section('content')
<h1>Detalles del Docente</h1>

<table>
    <thead>
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>{{ $teacher->user->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $teacher->user->email }}</td>
        </tr>
        <tr>
            <td><strong>Escalafón:</strong></td>
            <td>{{ $teacher->escalafon }}</td>
        </tr>
        <tr>
            <td><strong>Fecha de Nacimiento:</strong></td>
            <td>{{ $teacher->teacher_birth_date }}</td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td>{{ $teacher->teacher_phone_number }}</td>
        </tr>
    </tbody>
</table>

<h2>Secciones y Materias</h2>
<table>
    <thead>
        <tr>
            <th>Sección</th>
            <th>Materias</th>
        </tr>
    </thead>
    <tbody>
        @if($teacher->sections->isEmpty())
            <tr>
                <td colspan="2">No hay secciones asignadas.</td>
            </tr>
        @else
            @foreach($teacher->sections->unique('id') as $section)
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
        @endif
    </tbody>
</table>



    <a href="{{ route('admin.teacher.index') }}">Regresar a la lista de docentes</a>
@endsection
