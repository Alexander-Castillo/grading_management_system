@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Estudiante</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carnet">Carnet</label>
            <input type="text" name="carnet" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="student_birthdate">Fecha de Nacimiento</label>
            <input type="date" name="student_birthdate" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="career_id">Carrera</label>
            <select name="career_id" id="career_id" class="form-control" required>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->career_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="speciality_id">Especialidad</label>
            <select name="speciality_id" id="speciality_id" class="form-control" required>
                <!-- Las especialidades se cargarán dinámicamente -->
            </select>
        </div>

        <div class="form-group">
            <label for="section_ids">Secciones</label>
            <select name="section_ids[]" id="section_ids" class="form-control" multiple required>
                <!-- Las secciones se cargarán dinámicamente -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
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
