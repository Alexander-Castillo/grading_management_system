@extends('layouts.app')
@section('content')
    <div class="modal-footer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="title">
                        Registrar un nuevo estudiante
                    </h1>
                </div>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="" tabindex="-1">
                        <div class="mb-3">
                            <label for="first_name">Nombre del estudiante:</label>
                            <input type="text" name="first_name" placeholder="ej: Juan" required>
                            @error('first_name')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Apellidos del estudiante:</label>
                            <input type="text" name="last_name" placeholder="ej: Perez Perez" required>
                            @error('last_name')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">email del estudiante:</label>
                            <input type="text" name="email" placeholder="ej: example@example.com" required>
                            @error('email')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Carnet</label>
                            <input type="text" name="carnet" placeholder="ej: U20110004" required>
                            @error('carnet')
                                ;
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="student_birth_date">fecha de nacimiento:</label>
                            <input type="date" name="student_birth_date" required>
                            @error('student_birth_date')
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
                        
                      
                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar estudiante</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
@endsection
