@extends('layout.masterPage')

@section('title', 'Register')

@section('css')
    <link href="{{asset('css/authStyle.css')}}" rel="stylesheet">
@endsection


@section('content')


    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">
                <form class="rounded bg-white shadow p-5" method="POST" action="" >
                    @csrf
                    <img src="{{asset('img/logo.jpg')}}"
                        class="img-fluid mb-4" alt="logo" width="160" height="160">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Crear una nueva cuenta</h3>
                    <div class="fw-normal text-muted mb-4">
                        Ya tienes una cuenta? <a class="text-success fw-bold text-decoration-none" href="{{route('login')}}">Ingresar</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="ingrese su nombre">
                        <label for="floatingInput">Nombres completos</label>
                        @error('name')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <select class="form-select form-select-lg mb-3" name="typeDocument" id="typeDocument">
                        <option selected disabled>Tipo de documento</option>
                        <option value="TI">TI</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        @error('typeDocument')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </select>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="document" name="document" value="{{old('document')}}" placeholder="ingrese su nombre">
                        <label for="floatingInput">Numero de documento</label>
                        @error('document')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="ingrese su nombre">
                        <label for="floatingInput">Numero de celular</label>
                        @error('phone')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com">
                        <label for="floatingInput">Correo electronico</label>
                        @error('email')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="ingrese su contraseña">
                        <label for="floatingPassword">Contraseña</label>
                        @error('password')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation" placeholder="ingrese su contraseña">
                        <label for="floatingPassword">Confirmacion de la contraseña</label>
                        @error('password_confirmation')
                            <small class="text-danger mt-1"><strong>{{$message}}</strong></small>
                        @enderror
                    </div>
                    <div class="mt-2 text-end">
                        <a href="#" class="text-success fw-bold text-decoration-none">Olvidaste tu cuenta?</a>
                    </div>
                    <button type="submit" class="w-100 btn btn-success my-4">Ingresar</button>
                </form>
            </div>
        </div>
    </section>



@endsection
