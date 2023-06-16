@extends('dashboard.template.dashboard')

@section('title' , 'Crear un Usuario')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

@endsection


@section('content')


<h2 class="text-center mt-5">Listado de Usuarios</h2>
<table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Nombres completos</th>
            <th>Tipo de documento</th>
            <th>Numero de documento</th>
            <th>Numero de celular</th>
            <th>Tipo de estado</th>
            <th>Correo electronico</th>
            <th>Rol</th>
            <th >Editar</th>
            <th >Eliminar</th>
        </tr>
    </thead>
    <tbody class="text-center">
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
                    <td>{{ $user->role_id }}</td>
                    <td>
                        <a href="" class="btn btn-primary">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="" class="btn btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>

@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>

@endsection
