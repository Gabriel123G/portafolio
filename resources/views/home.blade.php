<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}?v={{ time() }}">

    <title>Gabriel | González</title>
</head>
<body style="margin: 0">
    @include('partials.header')
    <main>
        <header class="hero">
            <h1>Bienvenidos</h1>
        <img src="{{ asset('imagenes/hero_setup.jpg')}}" alt="imagen-portada-portafolio">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)" d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
        <section class="proyects">
            <h2>Mis Proyectos</h2>

            @if ($proyectos) 
            <div class="proyect-card">
            @foreach ($proyectos as $proyecto)

                <article class="proyect">
                    <img src="{{asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png')}}" alt="proyectos">
                    <h3>{{$proyectos['nombre']}}</h3>
                    <p>{{$proyectos['descripcion']}}</p>

                </article>

                 @endforeach
                </div>
            @endif

        </section>
    </main>
    @include('partials.footer')
</body>
</html>