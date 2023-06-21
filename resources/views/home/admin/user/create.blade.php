@extends('home.layout.masterPage')

@section('title', 'Crear Usuario')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-6">
                <h2 class="mb-4">Crear Usuario</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small>
                            {{ session('success') }}
                        </small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Ingrese su nombre">
                        @error('name')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo de Documento:</label>
                        <select class="form-select mb-3" name="typeDocument" id="typeDocument">
                            <option selected disabled>Tipo de documento</option>
                            <option value="TI">TI</option>
                            <option value="CC">CC</option>
                            <option value="CE">CE</option>
                        </select>
                        @error('typeDocument')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_documento">Número de Documento:</label>
                        <input type="number" class="form-control" id="document" name="document"
                            value="{{ old('document') }}" placeholder="Ingrese su número de documento">
                        @error('document')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Ingrese su número de teléfono">
                        @error('phone')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="name@example.com">
                        @error('email')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="estatus">Rol:</label>
                        <select class="form-control" id="role" name="role">
                            <option selected disabled>Seleccione un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="correo">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese su contraseña">
                        @error('password')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirme su contraseña">
                        @error('password_confirmation')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
