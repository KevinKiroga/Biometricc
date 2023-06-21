@extends('home.layout.masterPage')

@section('title', 'Datos personales')

@section('content')

    <section style="background-color: #ffffff;">
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
        <div class="container py-5">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            @if ($user->image != null)
                                <img src="{{ asset($user->image) }}" alt="avatar" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                            @else
                                <img src="{{ asset('img/profile/iconoDefecto.png') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                            @endif
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">{{ $user->email }}</p>
                            <p class="text-muted mb-4">{{ $user->phone }}</p>
                            <p class="text-muted mb-4">Tipo de documento: {{ $user->typeDocument }}</p>
                            <p class="text-muted mb-4">Numero de documento: {{ $user->document }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 float-left">
                    <div class="form-container">
                        <h2>Editar perfil</h2>
                        <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col">
                                <label class="form-label">Nombre completo:</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="col">
                                <label class="form-label">Tipo de documento:</label>
                                <select class="form-control" name="typeDocument" id="typeDocument">
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

                            <div class="col">
                                <label class="form-label">Número de celular:</label>
                                <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="col">
                                <label class="form-label">Tipo de estado:</label>
                                <select class="form-control" name="status" id="status">
                                    <option selected disabled>Tipo de estado</option>
                                    <option value="ACTIVO" {{ $user->status == 'ACTIVO' ? 'selected' : '' }}>Activo</option>
                                    <option value="INACTIVO" {{ $user->status == 'INACTIVO' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Correo:</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="col">
                                <label class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="col">
                                <label class="form-label">Imagen:</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="btn-container">
                                <button type="submit" class="btn btn-success" name="submit">Guardar</button>
                                <a href="#" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </section>
@endsection
