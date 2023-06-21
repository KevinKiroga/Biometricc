@extends('home.layout.masterPage')

@section('title', 'Editar Usuario')


@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-6">
                <h2 class="mb-4">Editar Usuario</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small>
                            {{ session('success') }}
                        </small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <small>
                            {{ session('danger') }}
                        </small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="POST" action="{{ route('users.update') }}">
                    @csrf
                    <input type="hidden" value=" {{ $user->id }}" name="id">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            placeholder="ingrese su nombre">
                        @error('name')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo de Documento:</label>
                        <select class="form-select mb-3" name="typeDocument" id="typeDocument">
                            <option selected disabled>{{ $user->typeDocument }}</option>
                            <option value="TI">TI</option>
                            <option value="CC">CC</option>
                            <option value="CE">CE</option>
                            @error('typeDocument')
                                <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                            @enderror
                        </select>
                        <div class="form-group">
                            <label for="numero_documento">Número de Documento:</label>
                            <input type="number" class="form-control" id="document" name="document"
                                value="{{ $user->document }}" placeholder="ingrese su nombre">
                            @error('document')
                                <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}" placeholder="ingrese su nombre">
                            @error('phone')
                                <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus:</label>
                            <select class="form-control" name="status" id="status">
                                <option selected disabled>{{ $user->status }}</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                @error('status')
                                    <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" placeholder="name@example.com">
                            @error('email')
                                <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="correo">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="ingrese su contraseña" value={{$user->password }}>
                            @error('password')
                                <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Editar Usuario</button>
                            <a href="#" class="btn btn-secondary">Cancelar</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
