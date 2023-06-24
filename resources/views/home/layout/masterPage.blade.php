<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ficha.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>@yield('title')</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    @yield('imagenPerfil')
                </span>

                <div class="text logo-text">
                    <span class="name"></span>
                    <span class="profession">Sistema</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!--li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li-->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('users.index') }}">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('role.index') }}">
                            <i class="bx bx-crown icon"></i>
                            <span class="text nav-text">Roles</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('ficha.index') }}">
                            <i class='bx bx-file icon'></i>
                            <span class="text nav-text">Fichas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('programa.index')}}">
                            <i class="bx bx-book icon"></i>
                            <span class="text nav-text">Programas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-check-circle icon'></i>
                            <span class="text nav-text">Asistencias</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">Horarios</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">Excusas</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="{{ route('profile') }}">
                        <i class='bx bxl-product-hunt icon'></i>
                        <span class="text nav-text">Perfil</span>
                    </a>
                </li>
                <li class="">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </li>


                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo oscuro</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>
    <section class="home">
        @if (!empty(trim($__env->yieldContent('content'))))
            @yield('content')
        @else
            <div class="background-image">
                <div class="welcome-message">
                    <h1>Bienvenido a la página</h1>
                    <p>¡Gracias por visitarnos!</p>
                </div>
            </div>
        @endif
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#user').DataTable();
        });

        $(document).ready(function() {
            $('#roles').DataTable();
        });
        $(document).ready(function() {
            $('#programa').DataTable();
        });
    </script>

    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Deseas eliminar este usuario?',
                text: "No se podra revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si , eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El usuario ha sido eliminado.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000 // Duración en milisegundos (3 segundos en este caso)
                    });

                    setTimeout(function() {
                        // Envía el formulario después de mostrar el mensaje
                        document.querySelector(`form[action="{{ route('users.destroy', '') }}/${userId}"]`)
                            .submit();
                    }, 3000); // Ajusta el valor para que coincida con la duración del timer
                }

            })
        }

        function confirmDeleteRole(roleId) {
            Swal.fire({
                title: 'Deseas eliminar este usuario?',
                text: "No se podra revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si , eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'El usuario ha sido eliminado.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000 // Duración en milisegundos (3 segundos en este caso)
                    });

                    setTimeout(function() {
                        // Envía el formulario después de mostrar el mensaje
                        document.querySelector(`form[action="{{ route('roles.destroy', '') }}/${roleId}"]`)
                            .submit();
                    }, 3000); // Ajusta el valor para que coincida con la duración del timer
                }

            })
        }
    </script>




    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
