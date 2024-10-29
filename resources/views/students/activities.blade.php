@extends('layouts.app')
@section('content')
@php
    dd($activities, $message);
@endphp
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <h2>Lista de Actividades</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Asignatura</th>
                    <th>Periodo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->subject->name ?? 'N/A' }}</td>
                        <td>{{ $activity->period->name ?? 'N/A' }}</td>
                        <td>
                            <!-- Aquí puedes agregar botones para editar o eliminar la actividad -->
                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection