<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <script src="{{ asset('js/admin.js') }}?v={{ time() }}"></script>
    <link rel="shortcut icon" href="{{ asset('imagenes/1.png')}}?v={{ time() }}">
    <title>login</title>
</head>

<body>
    @if ($errors->any())
    <div class="error-cont">
        @foreach ($errors->all() as $error)
        <span class="alert-error" id="alert-error">{{ $error }}</span>
        @endforeach
    </div>
    @endif
    @if (session('success'))
    <div class="error-cont">
        <span class="alert-error" id="alert-error">{{ session('success') }}</span>
    </div>
    @endif
    @include('partials.header')
    <main>
        <header class="hero">
            <div class="hero-titulo">
                <h1>Login</h1>
                <p>Ingere los datos de administrador para la gestion de la pagina</p>
            </div>
            <img src="{{ asset('imagenes/1.png')}}" alt="imagen-portada-portafolio">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
        <div class="div-form">
            <form class="formulario-contacto" action="{{ route('login.login') }}" method="POST">
                @csrf
                <label>E-mail</label>
                <input class="input-form" type="email" name="email">
                <label>Contraseña</label>
                <input class="input-form" type="password" name="password">
                <button>Iniciar sesion</button>
            </form>
        </div>
        <hr>
        <div class="div-form">
            <form class="formulario-contacto" action="{{ route('login.signup') }}" method="POST">
                @csrf
                <label>nombre</label>
                <input class="input-form" type="text" name="name">
                <label>E-mail</label>
                <input class="input-form" type="email" name="email">
                <label>Contraseña</label>
                <input class="input-form" type="password" name="password">
                <button>Iniciar sesion</button>
            </form>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>