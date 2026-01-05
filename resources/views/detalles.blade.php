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
            <div class="hero-titulo">
                <h1>Cafe Beraca</h1>
                <p>Pagina de venta de cafe y producos derivados para la empresa en surgimiento cafe beraca</p>
            </div>
            <img src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png')}}"
                alt="imagen-detalle-proyecoto">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
        <section class="img-proyecto">
            <article class="subtitulo-proyecto-1">
                <h2>Imagenes del proyecto</h2>
                <p>Aqui hay algunas imagenes que puede ilustrar de mejor manera la estetica
                    de este proyecto 
                </p>
            </article>
            <article class="imagenes-grid">
                <img class="img-grid-detalles" id="imagen-grid-1"
                    src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png') }}"
                    alt="cafe-beraca">
                <img class="img-grid-detalles" id="imagen-grid-2"
                    src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png') }}"
                    alt="cafe-beraca">
                <img class="img-grid-detalles" id="imagen-grid-3"
                    src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png') }}"
                    alt="cafe-beraca">
                <img class="img-grid-detalles" id="imagen-grid-4"
                    src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png') }}"
                    alt="cafe-beraca">
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
                <div id="habilidad-1" class="habilidad">
                    <h3>hola</h3>
                    <p>sdvmslm</p>
                </div>
                <div id="habilidad-2" class="habilidad">
                    <h3>hola</h3>
                    <p>ñsdnvsdlv</p>
                </div>
                <div id="habilidad-3" class="habilidad">
                    <h3>hola</h3>
                    <p>skdvmpsdov</p>
                </div>
                <div id="habilidad-4" class="habilidad">
                    <h3>hola</h3>
                    <p>ñldcasdñlvms</p>
                </div>
                <div id="habilidad-5" class="habilidad">
                    <p>sldfjsdfsldskfnsdfbsdvi
                        soidvsdvnsdivnsdvs
                        gdvnoksdnosrosjpdfei</p>
                    <img src="{{ asset('imagenes/imagenes-proyectos/Captura de pantalla 2025-04-20 104233.png') }}"
                        alt="portafolio">
                </div>
            </article>
            <article class="enlaces">
                <a href=""><img class="redes-img" src="{{ asset('imagenes/detalles/enlace.png') }}" alt=""></a>
                <a href=""><img class="redes-img" src="{{ asset('imagenes/Black-Github-Logo-PNG-Image.png') }}"
                        alt=""></a>
            </article>
        </section>
    </main>
    @include('partials.footer')
</body>

</html>