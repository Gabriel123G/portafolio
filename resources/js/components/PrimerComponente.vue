<template>
    <div>
        <h1>¡Hola desde Vue con Vite!</h1>
        <p>{{ mensaje }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            mensaje: 'Este es mi primer componente Vue integrado en Laravel con Vite.'
        };
    }
};
</script>

<style scoped>
    h1 {
        color: #42b983;
    }
</style>
