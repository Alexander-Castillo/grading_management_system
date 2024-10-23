@extends('layouts.app')
@section('content')
    <div class="modal-footer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="title">
                        Registrar un nuevo Docente
                    </h1>
                </div>
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf
                    <div class="modal-body" tabindex="-1">
                        <div class="mb-3">
                            <label for="first_name">Nombre del docente:</label>
                            <input type="text" name="first_name" placeholder="ej: Juan" required>
                            @error('first_name')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Apellidos del docente:</label>
                            <input type="text" name="last_name" placeholder="ej: Perez Perez" required>
                            @error('last_name')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="ej: example@example.com" required>
                            @error('email')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="ej: ********" required>
                            @error('password')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="escalafon">Escalafon:</label>
                            <input type="text" name="escalafon" placeholder="ej: Juan" required>
                            @error('escalafon')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher_birth_date">fecha de nacimiento:</label>
                            <input type="date" name="teacher_birth_date" required>
                            @error('teacher_birth_date')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher_phone_number">contacto telefonico:</label>
                            <input type="text" name="teacher_phone_number" placeholder="ej: 70088523" required>
                            @error('teacher_phone_number')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="sections">Asignar secciones:</label>
                            <select name="section_id[]" class="form-select" multiple required>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('section_id')
                            ;
                            <small>{{ $message }}</small>
                        @enderror
                        <div>
                            <label for="subjects">asignar Materias:</label>
                            <select name="subject_id[]" class="form-select" multiple required>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('subject_id')
                            ;
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar docente</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
@endsection
