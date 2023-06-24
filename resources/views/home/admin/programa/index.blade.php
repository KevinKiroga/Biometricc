@extends('home.layout.masterPage')

@section('title', 'Tabla de programas')

@section('content')
    <h1 class="titulo_ficha">Listado de programa</h1>

    <a href="{{ route('programa.create') }}" class="btn btn-success boton">Crear programa</a>
    <div class="container">
        <table id="programa" class="table table-striped table-bordered justify-content-center" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del programa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programas as $programa)
                    <tr>
                        <td>{{ $programa->id_program }}</td>
                        <td>{{ $programa->name_program }}</td>
                        <td>
                            <a href="{{ route('programa.edit', $programa->id_program) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('programa.destroy', $programa->id_program) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este programa?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection