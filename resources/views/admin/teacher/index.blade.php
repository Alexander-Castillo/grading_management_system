@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Docentes</h1>
    <table class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-4 text-left">Nombre del Docente</th>
                <th class="p-4 text-left">Email del Docente</th>
                <th class="p-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr class="border-b border-gray-200">
                    <td class="p-4">{{ $teacher->user->name }}</td>
                    <td class="p-4">{{ $teacher->user->email }}</td>
                    <td class="p-4">
                        <a href="{{ route('teachers.show', $teacher->id) }}" 
                           class="text-blue-500 hover:text-blue-700">
                            Información del docente
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">No hay maestros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-6 text-center">
        <a href="{{ route('teachers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Añadir Docente
        </a>
    </div>
</div>
@endsection