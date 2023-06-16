@extends('dashboard.template.dashboard')
@section('title' , 'Roles')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@endsection

@section('content')

<h2 class="text-center mt-5">Listado de roles</h2>

<div class="text-center mt-5">
    <a href="{{ route('roleCreate') }}" class="btn btn-success">Crear Rol</a>
</div>

<div class="mx-auto" style="width: 80%; margin-top: 20px;">
    <table id="rol" class="table table-striped dt-responsive nowrap" style="width: 100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <a href="{{ route('roleEdit', ['id' => $role->id]) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('roleDelete', ['id' => $role->id]) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
$('#rol').DataTable();
} );
</script>

@endsection

