@extends('home.layout.masterPage')

@section('title', 'Crear Ficha')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Crear Ficha</h5>
                        <form action="{{ route('ficha.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="number_ficha">Número de Ficha</label>
                                <input type="text" class="form-control" id="number_ficha" name="number_ficha" required>
                            </div>
                            <div class="form-group">
                                <label for="date_start">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" required>
                            </div>
                            <div class="form-group">
                                <label for="date_end">Fecha de Fin</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" required>
                            </div>
                            <div class="form-group">
                                <label for="programa_id">Programa de Formación</label>
                                <select class="form-control" id="programa_id" name="programa_id" required>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id_program }}">{{ $programa->name_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection