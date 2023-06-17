@extends('rules.layout.dashboard')

@section('title', 'Editar Usuario')

@section('content')
    <div class="text-center mb-4">
        <h3>Editar usuario</h3>
        <h2>✏️</h2>
        <p class="text-muted">Actualizar la información del usuario</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="{{ route('user.update', $user->id) }}" method="post" style="width:50vw; min-width:300px;">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nombre completo:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="col">
                    <label class="form-label">Tipo de documento:</label>
                    <select class="form-select mb-3" name="typeDocument" id="typeDocument">
                        <option selected disabled>Tipo de documento</option>
                        <option value="TI" {{ $user->typeDocument == 'TI' ? 'selected' : '' }}>TI</option>
                        <option value="CC" {{ $user->typeDocument == 'CC' ? 'selected' : '' }}>CC</option>
                        <option value="CE" {{ $user->typeDocument == 'CE' ? 'selected' : '' }}>CE</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Número de documento:</label>
                    <input type="number" class="form-control" name="document" value="{{ $user->document }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Número de celular:</label>
                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>

                <div class="col">
                    <label class="form-label">Tipo de estado:</label>
                    <select class="form-select mb-3" name="status" id="status">
                        <option selected disabled>Tipo de estado</option>
                        <option value="ATIVO" {{ $user->status == 'ATIVO' ? 'selected' : '' }}>Activo</option>
                        <option value="INATIVO" {{ $user->status == 'INATIVO' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="col">
                    <label class="form-label">Imagen:</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit"
                    style="align-items: center; justify-content: center;">Guardar</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
