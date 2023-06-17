@extends('rules.layout.dashboard')

@section('title', 'Usuarios')
@section('css')
    <link href="{{ asset('css/userindex.css') }}" rel="stylesheet">
@endsection

@section('content')
    <a href="{{ route('user.create') }}">Crear usuario</a>

    <table id="user" class="table table-striped dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nombre completo</th>
                <th>Tipo de documento</th>
                <th>Documento</th>
                <th>Celular</th>
                <th>Tipo de estado</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->typeDocument }}</td>
                    <td>{{ $user->document }}</td>
                    <td>{{ $user->phone }}</td>

                    @if ($user->status == 'ATIVO')
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
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
