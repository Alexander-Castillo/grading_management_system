@extends('layouts.app')

@section('content')
    <h1 class="title">Lista de Docentes</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre del Docente</th>
                <th>Email del docente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->user->email }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}">Informacion del docente</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay maestros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <button type="button" class="btn btn-success">
    <a href="{{ route('teachers.create') }}">Add Teacher</a></button>
@endsection