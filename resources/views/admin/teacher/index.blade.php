@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-lg rounded-lg mt-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Lista de Docentes</h1>
    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-400 text-white">
            <tr>
                <th class="p-4 text-left text-sm font-semibold">Nombre del Docente</th>
                <th class="p-4 text-left text-sm font-semibold">Email del Docente</th>
                <th class="p-4 text-left text-sm font-semibold">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                    <td class="p-4 text-gray-700">{{ $teacher->user->name }}</td>
                    <td class="p-4 text-gray-700">{{ $teacher->user->email }}</td>
                    <td class="p-4">
                        <a href="{{ route('teachers.show', $teacher->id) }}" 
                           class="text-blue-500 hover:text-blue-700 font-semibold">
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
        <a href="{{ route('teachers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150">
            Añadir Docente
        </a>
    </div>
</div>
<script>
    document.querySelector('a[href="{{ route('teachers.create') }}"]').addEventListener('click', function(event) {
        event.preventDefault();
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 animate-bounce';
        button.disabled = true;
        button.innerHTML = `
            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                <!-- SVG content here -->
            </svg>
            Processing...
        `;
        this.replaceWith(button);
        window.location.href = this.href;
    });
</script>
@endsection
