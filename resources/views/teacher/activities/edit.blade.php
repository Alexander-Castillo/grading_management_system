@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Fecha de Entrega de la Actividad</h1>

    <form action="{{ route('activities.update', $id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="new_due_date">Nueva Fecha de Entrega:</label>
            <input type="date" name="new_due_date" value="{{ $new_due_date }}">
        </div>
        
        <button type="submit">Actualizar Fecha</button>
    </form>
</div>
@endsection
