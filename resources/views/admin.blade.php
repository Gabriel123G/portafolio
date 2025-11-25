<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
      <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <title>Admin</title>
</head>

<body>
    @include('partials.header')
    <main>
        <header class="hero">
            <div class="hero-titulo">
                <h1>Nombre del admin</h1>
                <p>Bienvenido Nombre del admin</p>
            </div>
            <img src="{{ asset('imagenes/hero_setup.jpg')}}" alt="imagen-portada-portafolio">
        </header>
        <svg class="svg-curve" viewBox="0 0 1440 79">
            <path style="fill: rgb(10, 0, 27)"
                d="M-100 79C-100 79 218.416 23.165 693.5 23.165C1168.58 23.165 1487 79 1487 79V0H-100V79Z">
        </svg>
        <section class="menu-admin">
            <div id="Crear" class="control-admin">
                <button onclick="">
                    <img src="{{ asset('imagenes/Iconos/new-file-icon.png') }}" alt="">
                </button>
                <p>Crear un proyecto</p>
            </div>
            <div id="editar" class="control-admin">
                <button onclick="">
                    <img src="{{ asset('imagenes/Iconos/edit-validated-icon.png') }}" alt="">
                </button>
                <p>Editar un proyecto</p>
            </div>
            <div id="eliminar" class="control-admin">
                <button onclick="">
                    <img src="{{ asset('imagenes/Iconos/delete-file-icon.png') }}" alt="">
                </button>
                 <p>Eliminar un proyecto</p>
            </div>
        </section>
        <section>
            <div id="form-crear" class="form-control-admin">
                <form action="" method="POST">
                    @csrf
                    <label>Elija las imagenes del proyecto deben ser solo 6</label>
                    <input type="file" name="imagenes[]" multiple accept="image/*">
                    <label>nombre del proyecto</label>
                    <input type="text" name="nombreProyecto">
                    <label> ingrese una descripcion breve del proyecto</label>
                    <textarea name="descripcionBreve"></textarea>
                    <label> ingrese una descripcion mas detallada</label>
                    <textarea name="descripcionDetallada"></textarea>
                    <button type="submit">Guardar proyecto</button>
                </form>
            </div>
            <div id="form-editar" class="form-control-admin">
                <form action="">

                </form>
            </div>
            <div id="form-eliminar" class="form-control-admin">
                <form action="">

                </form>
            </div>
        </section>
    </main>
    @include('partials.footer')
</body>

</html>