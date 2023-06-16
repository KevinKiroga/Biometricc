@extends('dashboard.template.dashboard')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Crear nuevo rol</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('roleStore') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
