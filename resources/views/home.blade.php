<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">

    <title>Gabriel | González</title>
</head>

<body>
    @include('partials.header')
    <main>
        <header class="hero">
            <div class="hero-titulo">
                <h1>Bienvenidos</h1>
                <p>Mi nombre es Gabriel González, soy desarrollador fullstack junior y estudiante en la facultade de
                    ingienieria en sistema de la utp en la licenciatura de gestion y desarrollo de software.</p>
            </div>
            <img src="{{ asset('imagenes/hero_setup.jpg')}}" alt="imagen-portada-portafolio">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
        <section class="proyects">
            <div class="proyects-titulo">
                <h2>Mis Proyectos</h2>
                <p>Aqui hay algunos proyectos en los que he trabajado</p>
                <hr style="width: 75%; margin-bottom: 2%;">
            </div>
            @if ($proyectos)
            <div class="proyect-card">
                @foreach ($proyectos as $proyecto)

                <article class="proyect">
                    <a href="">
                        <img src="{{asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png')}}"
                            alt="proyectos">
                    </a>
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