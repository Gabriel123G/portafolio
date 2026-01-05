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
    <script>
    window.addEventListener('DOMContentLoaded', function(){
        const crear = document.getElementById('form-crear');
        const editar = document.getElementById('form-editar');
        const eliminar = document.getElementById('form-eliminar');
            crear.style.display = 'none';
            editar.style.display = 'none';
            eliminar.style.display = 'none';
        document.getElementById('imagenes').addEventListener('change', function() {
            const maxFiles = 6;
            if (this.files.length > maxFiles) {
                alert(`Solo puedes subir un máximo de ${maxFiles} imágenes.`);
                this.value = "";
            }
        });
    });
    function controlAdmin(opt){
        const crear = document.getElementById('form-crear');
        const editar = document.getElementById('form-editar');
        const eliminar = document.getElementById('form-eliminar');
        if(opt == 'crear'){
            crear.style.display = 'block';
            editar.style.display = 'none';
            eliminar.style.display = 'none';
        }else if(opt == 'editar'){
            crear.style.display = 'none';
            editar.style.display = 'block';
            eliminar.style.display = 'none';
        }else if(opt == 'eliminar'){
            crear.style.display = 'none';
            editar.style.display = 'none';
            eliminar.style.display = 'block';
        }
    }
    </script>
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
                <button onclick="controlAdmin('crear')">
                    <img src="{{ asset('imagenes/Iconos/new-file-icon.png') }}" alt="">
                </button>
                <p>Crear un proyecto</p>
            </div>
            <div id="editar" class="control-admin">
                <button onclick="controlAdmin('editar')">
                    <img src="{{ asset('imagenes/Iconos/edit-validated-icon.png') }}" alt="">
                </button>
                <p>Editar un proyecto</p>
            </div>
            <div id="eliminar" class="control-admin">
                <button onclick="controlAdmin('eliminar')">
                    <img src="{{ asset('imagenes/Iconos/delete-file-icon.png') }}" alt="">
                </button>
                <p>Eliminar un proyecto</p>
            </div>
        </section>
        <section class="section-form">
            <div id="form-crear" class="form-control-admin">
                <form action="" method="POST">
                    <div class="form-titulo">
                        <h3>Crear Proyecto</h3>
                    </div>
                    @csrf
                    <label>Elija las imagenes del proyecto deben ser solo 6</label>
                    <input type="file" b id="imagenes" name="imagenes[]" multiple accept="image/*">
                    <label>nombre del proyecto</label>
                    <input type="text" name="nombreProyecto">
                    <label> ingrese una descripcion breve del proyecto</label>
                    <textarea name="descripcionBreve"></textarea>
                    <div class="habilidades">
                        <div class="habilidad " >
                            <label>habilidad 1</label>
                            <input type="text" name="nombre-h1">
                            <textarea name="descripcion-h1"></textarea>
                        </div>
                        <div class="habilidad ">
                            <label> habilidad 2</label>
                            <input type="text" name="nombre-h2">
                            <textarea name="descripcion-h2"></textarea>
                        </div>
                        <div class="habilidad ">
                            <label> habilidad 3</label>
                            <input type="text" name="nombre-h3">
                            <textarea name="descripcion-3"></textarea>
                        </div>
                        <div class="habilidad ">
                            <label> habilidad 4</label>
                            <input type="text" name="nombre-h4">
                            <textarea name="descripcion-h4"></textarea>
                        </div>
                    </div>
                    <button type="submit">Guardar proyecto</button>
                </form>
            </div>
            <div id="form-editar" class="form-control-admin">
                <form action="" method="POST">
                    @csrf
                      <div class="form-titulo">
                        <h3>Editar Proyecto</h3>
                    </div>
                    <select name="" id="">
                        <option value="">hola</option>
                    </select>
                    <label>nombre del proyecto</label>
                    <input type="text" name="nombreProyecto">
                    <label> ingrese una descripcion breve del proyecto</label>
                    <textarea name="descripcionBreve"></textarea>
                    <div class="habilidades">
                        <div class="habilidad 1">
                            <label>habilidad 1</label>
                            <input type="text" name="nombre-h1">
                            <textarea name="descripcion-h1"></textarea>
                        </div>
                        <div class="habilidad 2">
                            <label> habilidad 2</label>
                            <input type="text" name="nombre-h2">
                            <textarea name="descripcion-h2"></textarea>
                        </div>
                        <div class="habilidad 3">
                            <label> habilidad 3</label>
                            <input type="text" name="nombre-h3">
                            <textarea name="descripcion-3"></textarea>
                        </div>
                        <div class="habilidad 4">
                            <label> habilidad 4</label>
                            <input type="text" name="nombre-h4">
                            <textarea name="descripcion-h4"></textarea>
                        </div>
                    </div>
                    <button type="submit">Guardar proyecto</button>
                </form>
            </div>
            <div id="form-eliminar" class="form-control-admin">
                <form action="" method="POST">
                    @csrf
                      <div class="form-titulo">
                        <h3>Eliminar Proyecto</h3>
                    </div>
                    <select name="proyecto">
                        <option value="id-proyecto">2</option>
                    </select>
                    <button type="submit">Eliminar proyecto</button>
                </form>
            </div>
        </section>
    </main>
    @include('partials.footer')
</body>

</html>
