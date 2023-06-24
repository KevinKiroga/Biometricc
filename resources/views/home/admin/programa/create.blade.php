@extends('home.layout.masterPage')

@section('title', 'Crear programa')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Crear Programa</h5>
                        <form action="{{ route('programa.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name_program">Nombre del programa</label>
                                <input type="text" class="form-control" id="name_program" name="name_program" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection