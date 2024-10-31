@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-2xl p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Registrar Estudiante</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="first_name" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 font-medium mb-2">Apellido</label>
            <input type="text" name="last_name" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
            <input type="password" name="password" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="carnet" class="block text-gray-700 font-medium mb-2">Carnet</label>
            <input type="text" name="carnet" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="student_birthdate" class="block text-gray-700 font-medium mb-2">Fecha de Nacimiento</label>
            <input type="date" name="student_birthdate" class="form-input w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="career_id" class="block text-gray-700 font-medium mb-2">Carrera</label>
            
            <select name="career_id" id="career_id" class="form-select w-full p-2 border border-gray-300 rounded-lg" required>
                <option value="">Select a Subject and Section</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->career_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="speciality_id" class="block text-gray-700 font-medium mb-2">Especialidad</label>
            <select name="speciality_id" id="speciality_id" class="form-select w-full p-2 border border-gray-300 rounded-lg" required>
                <!-- Las especialidades se cargarán dinámicamente -->
                <option value="">Select a Subject and Section</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="section_ids" class="block text-gray-700 font-medium mb-2">Secciones</label>

            <select name="section_ids[]" id="section_ids" class="form-select w-full p-2 border border-gray-300 rounded-lg" multiple required>
                <!-- Las secciones se cargarán dinámicamente -->
                <option value="">Select a Subject and Section</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Registrar Estudiante
        </button>

        <div class="text-center mt-4">
            <a href="{{ route('admin.student.index') }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Volver a la lista de estudiantes
            </a>
        </div>        

    </form>
</div>
<script>
    document.getElementById('career_id').addEventListener('change', function() {
        const careerId = this.value;

        // Cargar especialidades relacionadas a la carrera
        fetch(`/api/specialities/${careerId}`)
            .then(response => response.json())
            .then(data => {
                const specialitySelect = document.getElementById('speciality_id');
                specialitySelect.innerHTML = '';
                data.forEach(speciality => {
                    specialitySelect.innerHTML += `<option value="${speciality.id}">${speciality.speciality_name}</option>`;
                });

                // Limpiar secciones al cambiar la carrera
                const sectionSelect = document.getElementById('section_ids');
                sectionSelect.innerHTML = '';
            });

        // Agregar evento para cargar secciones al cambiar la especialidad
        document.getElementById('speciality_id').addEventListener('change', function() {
            const specialityId = this.value;

            // Cargar secciones relacionadas a la especialidad
            fetch(`/api/sections/${specialityId}`)
                .then(response => response.json())
                .then(data => {
                    const sectionSelect = document.getElementById('section_ids');
                    sectionSelect.innerHTML = '';
                    data.forEach(section => {
                        const sectionName = section.section_name;
                        const subjects = section.subjects.map(subject => subject.subject_name).join(', ');
                        const teachers = section.teachers.map(teacher => teacher.user.name).join(', ');

                        // Agregar opción para cada materia y docente
                        section.subjects.forEach((subject, index) => {
                            const teacherName = section.teachers[index]?.user.name || 'Sin docente';
                            sectionSelect.innerHTML += `<option value="${section.id}">${sectionName} - ${subject.subject_name} (Docente: ${teacherName})</option>`;
                        });
                    });
                });
        });
    });
</script>

@endsection
