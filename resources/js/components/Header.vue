<template>
    <header class="hero">
        <nav>
            <ul class="nav-lista">
                <li><a href="###">contactame</a></li>
                <li><a href="###">mas sobre mi</a></li>
            </ul>
        </nav>
        <div class="titulo-h1">
            <h1>Bienvenidos</h1>
            <img :src="'/imagenes/hero_setup.jpg'" alt="">
        </div>
    </header>
</template>
<style scoped>
    *{
        color: aliceblue;
    }
    .nav-lista{
        display: flex;
        justify-content: right;
    }
    .nav-lista li{
        margin: 0 3vw ;
        display: inline;
    }
    .hero{
        background-color: rgb(10, 0, 27);
   
    }
    .titulo-h1{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .titulo-h1 h1{
        font-family:'Times New Roman', Times, serif;
        font-size: 7em;
    }
</style>