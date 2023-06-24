@extends('home.layout.masterPage')

@section('title', 'Editar programa')

@section('content')
    <h1>Editar programa</h1>

    <form action="{{ route('programa.update', $programa->id_program) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name_program">Nombre del programa</label>
            <input type="text" class="form-control" id="name_program" name="name_program" value="{{ $programa->name_program }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection