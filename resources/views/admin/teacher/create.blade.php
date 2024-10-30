@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6 max-w-lg bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Registrar un nuevo Docente</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 font-semibold">Nombre del docente:</label>
            <input type="text" name="first_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 font-semibold">Apellidos del docente:</label>
            <input type="text" name="last_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Email:</label>
            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-semibold">Password:</label>
            <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="escalafon" class="block text-gray-700 font-semibold">Escalafon:</label>
            <input type="text" name="escalafon" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="teacher_birthdate" class="block text-gray-700 font-semibold">Fecha de nacimiento:</label>
            <input type="date" name="teacher_birthdate" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="teacher_phone_number" class="block text-gray-700 font-semibold">Contacto telefónico:</label>
            <input type="text" name="teacher_phone_number" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="sections" class="block text-gray-700 font-semibold">Asignar secciones:</label>
            <select name="section_id[]" multiple required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="subjects" class="block text-gray-700 font-semibold">Asignar Materias:</label>
            <select name="subject_id[]" multiple required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Registrar docente
            </button>
        </div>
    </form>
</div>
@endsection