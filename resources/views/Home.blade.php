<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gabriel | González</title>
</head>
<body>
    @include('partials.Header')
    <main>

        <section class="sobre-mi"> <!-- seccion de sobre mi  -->
            <h2>Sobre Mi</h2>
            <article class="experiencia">
                <h3>Experiencia</h3>
            </article>
            <article class="pasion">
                <h3>Pasion</h3>
            </article>
            <article class="colaboracion">
                <h3>Colaboracion</h3>
            </article>
        </section><!-- fin seccion sobre mi-->

        <section class="habilidades"> <!--habilidades-->
            <h2>Habilidades Tecnicas</h2>
            <article class="front-end">
                <h3>Front-End</h3>
                <div class="tarjeta-habilidades">
                    <img src="" alt="">
                    <p>habilidad</p>
                </div>
            </article>

            <article class="back-end">
                <h3>Back-End</h3>
                <div class="tarjeta-habilidades">
                    <img src="" alt="">
                    <p>habilidad</p>
                </div>
            </article>
        </section><!-- fin seccion habilidades-->
        <seccion class="proyectos">
            <h2>Proyectos Destacados</h2>
                <div class="tarjeta-proyecto">
                    <img src="" alt="">
                    <a href="">Cafe Beraca</a>
                    <p>descripcion</p>
                </div>

                <div class="tarjeta-proyecto">
                    <img src="" alt="">
                    <a href="">Cafe Beraca</a>
                    <p>descripcion</p>
                </div>
                <button id="mas-proyecotos" class="mas-proyectos" onclick=""> Mas Proyectos</button>
            </article>
        </seccion>
    </main>
    @include('partials.Footer')
</body>
</html>