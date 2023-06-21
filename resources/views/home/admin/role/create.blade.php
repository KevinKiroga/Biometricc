@extends('home.layout.masterPage')

@section('title', 'Crear Rol')

@section('content')


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
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-lg-6">
                <h2 class="mb-4">Crear Rol</h2>
                <form method="POST" action="{{ route('role.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Rol:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del rol">
                        @error('name')
                            <small class="text-danger mt-1"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Crear Rol</button>
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
