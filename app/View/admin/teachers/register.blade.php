<form action="{{route('admin.teachers.register.submit')}}" method="POST">
    <!-- directiva de token de sesion csrf -->
    @csrf
    <p>REGISTRAR MAESTRO</p>

    <!-- nombre y apellido -->
    <label for="first_name">Nombre:</label>
    <input type="text" name="first_name" id="first_name" required>
    <label for="last_name">Apellidos</label>
    <input type="text" name="last_name" id="last_name" required>
    <!-- correo electrónico -->
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    <!-- contraseña -->
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    <!-- Escalafon -->
    <label for="escalafon">Escalafon:</label>
    <input type="text" name="escalafon" id="escalafon" required>
    <!-- Especializacion -->
    <label for="specialization">Especialización:</label>
    <input type="text" name="specialization" id="specialization" required>
    <!-- Fecha de Nacimiento -->
    <label for="birthdate">Fecha de Nacimiento:</label>
    <input type="date" name="birthdate" id="birthdate" required>
    <!-- telefono -->
    <label for="phone_number">Teléfono:</label>
    <input type="text" id="phone_number" name="phone_number" required>
    <label for="sections">Secciones:</label>
    <select name="sections[]" multiple required>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->name }}</option>
        @endforeach
    </select>

    <label for="subjects">Materias:</label>
    <select name="subjects[]" multiple required>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    <!-- Botón para enviar el formulario -->
    <button type="submit">Registrar Maestro.</button>
</form>