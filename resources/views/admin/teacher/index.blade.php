@extends('layouts.app')

@section('content')
    <h1>Lista de Docentes</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Docente</th>
                <th>Email del docente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
<<<<<<< HEAD
                <tr class="border-b border-gray-200">
                    <td class="p-4">{{ $teacher->user->name }}</td>
                    <td class="p-4">{{ $teacher->user->email }}</td>
                    <td class="p-4">
                        <a href="{{ route('teachers.show', $teacher->id) }}" 
                           class="text-blue-500 hover:text-blue-700">
                            Información del docente
                        </a>
=======
                <tr>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->user->email }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}">Informacion del docente</a>
>>>>>>> 92445dbd6006010b20e7c4c2d4ef93a434f74243
                    </td>
                </tr>
            @empty
                <tr>
<<<<<<< HEAD
                    <td colspan="3" class="p-4 text-center text-gray-500">No hay maestros registrados.</td>
=======
                    <td colspan="3">No hay maestros registrados.</td>
>>>>>>> 92445dbd6006010b20e7c4c2d4ef93a434f74243
                </tr>
            @endforelse
        </tbody>
    </table>
<<<<<<< HEAD
    <div class="mt-6 text-center">
        <a href="{{ route('teachers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Añadir Docente
        </a>
    </div>
</div>
=======
    <a href="{{ route('teachers.create') }}">Agregar docentes</a>
>>>>>>> 92445dbd6006010b20e7c4c2d4ef93a434f74243
@endsection