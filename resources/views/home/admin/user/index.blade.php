@extends('home.layout.masterPage')

@section('title', 'Tabla de usuarios')

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
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

        <a href="{{ route('users.create') }}" class="btn btn-success">Crear Usuario</a>

        <table id="user" class="table table-striped table-bordered justify-content-center align-items-center" style="width: 100vh">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Correo</th>
                    <th>Imagenes</th>
                    <th>Rol</th> <!-- New column for displaying role -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->typeDocument }}</td>
                        <td>{{ $user->document }}</td>
                        <td>{{ $user->phone }}</td>
                        @if ($user->status == 'ACTIVO')
                            <td>
                                <span class="btn btn-success btn-sm rounded-pill">{{ $user->status }}</span>
                            </td>
                        @else
                            <td>
                                <span class="btn btn-danger btn-sm rounded-pill">{{ $user->status }}</span>
                            </td>
                        @endif
                        <td>{{ $user->email }}</td>
                        <td>
                        @if ($user->image != null)
                                <img src="{{ asset($user->image) }}" alt="avatar" class="img-fluid" style="width: 150px;">
                            @else
                                <img src="{{ asset('img/profile/iconoDefecto.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            @endif
                        </td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); confirmDelete('{{ $user->id }}')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
