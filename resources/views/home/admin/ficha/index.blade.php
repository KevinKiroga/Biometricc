@extends('home.layout.masterPage')

@section('title', 'Tabla de roles')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                            <img src="{{asset('img/profile/panelsena.jpg')}}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                        <h5 class="my-3"></h5>
                        <p class="text-muted mb-1"></p>
                        <p class="text-muted mb-4"></p>
                        <p class="text-muted mb-4">Tipo de documento: </p>
                        <p class="text-muted mb-4">Numero de documento: </p>
                    </div>
                </div>
            </div>

        @endsection
