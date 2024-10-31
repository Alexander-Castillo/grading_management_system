@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Editar Fecha de Entrega de la Actividad</h1>

    <form action="{{ route('activities.update', $id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="new_due_date" class="block text-sm font-medium text-gray-700">Nueva Fecha de Entrega:</label>
            <input type="date" name="new_due_date" value="{{ $new_due_date }}" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        
        <button type="submit" class="btn btn-primary bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Actualizar Fecha</button>
    </form>
</div>
@endsection
