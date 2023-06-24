@extends('home.layout.masterPage')

@section('title', 'Tabla de roles')

@section('content')

<h2 class="titulo_ficha">Listado de Roles</h2>
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
    <a href="{{ route('role.create') }}" class="btn btn-success boton">Crear Rol</a>
    <div class="container">
        

        <table id="roles" class="table table-striped table-bordered justify-content-center align-items-center"
            style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id}}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('role.edit' , $role->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="event.preventDefault();
                            confirmDeleteRole('{{ $role->id }}')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
