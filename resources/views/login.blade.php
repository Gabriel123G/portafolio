<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}?v={{ time() }}">

    <title>login</title>
</head>
<body>
    @include('partials.header')
     <main>
     <header class="hero">
            <div class="hero-titulo">
                <h1>Login</h1>
                <p>Ingere los datos de administrador para la gestion de la pagina</p>
            </div>
            <img src="{{ asset('imagenes/hero_setup.jpg')}}" alt="imagen-portada-portafolio">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
       
        <form action="{{ route('login.login') }}" method="POST">
            @csrf
            <label>Nombre</label>
            <input type="text" name="name">
            <label>E-mail</label>
            <input type="email" name="email">
            <label>Contraseña</label>
            <input type="password" name="password">
            <button>iniciar sesion</button>
        </form>
        </main>
        
    @include('partials.footer')
</body>
</html>