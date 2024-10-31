@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Lista de Estudiantes</h1>

    <table class="w-full table-auto bg-gray-100 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nombre</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Carnet</th>
                <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
            @foreach($students as $student)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $student->user->name }}</td>
                    <td class="py-3 px-6">{{ $student->user->email }}</td>
                    <td class="py-3 px-6">{{ $student->carnet }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                            Ver Información
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6 flex justify-center">
        <a href="{{ route('students.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Agregar nuevo estudiante
        </a>
    </div>
</div>
@endsection
