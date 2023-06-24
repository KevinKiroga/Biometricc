@extends('home.layout.masterPage')

@section('title', 'Listado de fichas')

@section('content')
    <h2 class="titulo_ficha">Listado de fichas</h2>
    <div class="container py-5">
        <div class="row mt-5">
            @foreach ($fichas as $ficha)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('img/logo.jpg') }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h5 class="my-3">Número de la ficha: {{ $ficha->number_ficha }}</h5>
                            <p class="text-muted mb-1">Fecha de inicio: {{ $ficha->date_start }}</p>
                            <p class="text-muted mb-1">Fecha de fin: {{ $ficha->date_end }}</p>
                            <p class="text-muted mb-1">Programa de formación: {{ $ficha->programa ? $ficha->programa->name_program : 'No asignado' }}</p>
                            <div class="mt-3">
                                <a href="{{ route('ficha.edit', ['ficha' => $ficha->id_ficha]) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('ficha.destroy', $ficha->id_ficha) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta ficha?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="icon-container">
        <a href="{{ route('ficha.create') }}" class="icon-link">
            <i class="fas fa-plus-circle fa-2x green-icon"></i>
        </a>
    </div>
@endsection