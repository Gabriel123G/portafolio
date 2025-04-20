<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gabriel | González</title>
</head>
<body>
    @include('partials.header')
    <main>
        <header class="hero">
            <h1>Bienvenidos</h1>
        <img src="{{ asset('imagenes/hero_setup.jpg')}}" alt="imagen-portada-portafolio">
        </header>
        <section class="proyects">
            <h2>Mis Proyectos</h2>
            @if ($proyectos) 
            @foreach ($proyectos as $proyecto)
            <div class="proyect">
                <h3>{{$proyectos['nombre']}}</h3>
                <img src="{{asset($proyectos['url'])}}" alt="proyectos">
                <p>{{$proyectos['descripcion']}}</p>
            </div>
            @endforeach
            @endif

        </section>
    </main>
</body>
</html>