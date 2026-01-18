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

    <title>Gabriel | González</title>
</head>

<body>
    @include('partials.header')
    <main>
        <header class="hero">

            @if ($project)
                <div class="hero-titulo">
                    <h1>{{ $project->name }}</h1>
                    <p>{{ $project->details }}</p>
                </div>
            @else
                <div class="hero-titulo">
                    <h1>Ningun proyecto</h1>
                    <p>algo salio mal en la busqueda del proyecto</p>
                </div>

            @endif

            @if ($project)
                @foreach ($project->images_urls as $pro)
                    @if ($loop->iteration == 1)
                        <img src="{{ route('imagen.proxy', ['id' => $pro->url])}}" alt="imagen-detalle-proyecoto">
                    @endif
                @endforeach
            @else
                  <img src="{{ asset('imagenes/hero_setup.jpg') }}" alt="imagen-detalle-proyecoto">
            @endif

        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>

        @if ($project)

            <section class="img-proyecto">
                <article class="subtitulo-proyecto-1">
                    <h2>Imagenes del proyecto</h2>
                    <p>Aqui hay algunas imagenes que puede ilustrar de mejor manera la estetica
                        de este proyecto
                    </p>
                </article>
                <article class="imagenes-grid">

                    @foreach ($project->images_urls as $pro)
                    @if ($loop->iteration == 2)
                    <img class="img-grid-detalles" id="imagen-grid-1" src="{{ route('imagen.proxy', ['id' => $pro->url])}}"
                        alt="cafe-beraca">
                    @elseif($loop->iteration == 3)
                    <img class="img-grid-detalles" id="imagen-grid-2" src="{{ route('imagen.proxy', ['id' => $pro->url])}}"
                        alt="cafe-beraca">
                    @elseif($loop->iteration == 4)
                    <img class="img-grid-detalles" id="imagen-grid-3" src="{{ route('imagen.proxy', ['id' => $pro->url])}}"
                        alt="cafe-beraca">
                    @elseif($loop->iteration == 5)
                    <img class="img-grid-detalles" id="imagen-grid-4" src="{{ route('imagen.proxy', ['id' => $pro->url])}}"
                        alt="cafe-beraca">
                    @endif
                    @endforeach

                </article>
            </section>
            <section class="habilidades">
                <article class="subtitulo-proyecto-2">
                    <h2>Habilidades aprendidas</h2>
                    <p>Estas son algunas habilidades que pude desarrollar en el proseso de creacion o
                        participacion de este proyecto.
                    </p>
                </article>
                <article class="habilidades-grid">
                    @foreach ($project->skills as $pro)
                    @if ($loop->iteration == 1)
                    <div id="habilidad-1" class="habilidad">
                        <h3>{{ $pro->skill }}</h3>
                        <p>{{ $pro->details }}</p>
                    </div>
                    @elseif ($loop->iteration == 2)
                    <div id="habilidad-2" class="habilidad">
                        <h3>{{ $pro->skill }}</h3>
                        <p>{{ $pro->details }}</p>
                    </div>
                    @elseif ($loop->iteration == 3)
                    <div id="habilidad-3" class="habilidad">
                       <h3>{{ $pro->skill }}</h3>
                        <p>{{ $pro->details }}</p>
                    </div>
                    @elseif ($loop->iteration == 4)
                    <div id="habilidad-4" class="habilidad">
                       <h3>{{ $pro->skill }}</h3>
                       <p>{{ $pro->details }}</p>
                    </div>
                    @endif
                    @endforeach
                    <div id="habilidad-5" class="habilidad">
                        @foreach ($project->images_urls as $pro)
                            @if ($loop->iteration == 6)
                                <img src="{{ route('imagen.proxy', ['id' => $pro->url]) }}"
                                    alt="portafolio">
                            @endif
                        @endforeach
                    </div>
                </article>
                    <article class="enlaces">
                        @if ($project->github)
                            <a href="{{ $project->github }}"><img class="redes-img" src="{{ asset('imagenes/detalles/enlace.png') }}" alt=""></a>
                        @endif
                        @if ($project->web)
                            <a href="{{ $project->web }}"><img class="redes-img" src="{{ asset('imagenes/Black-Github-Logo-PNG-Image.png') }}"></a>
                        @endif
                    </article>
                
            </section>

        @endif

    </main>

    @include('partials.footer')

</body>

</html>