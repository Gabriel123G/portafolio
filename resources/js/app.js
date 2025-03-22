import './bootstrap';
import { createApp } from 'vue';
import MiPrimerComponente from './components/PrimerComponente.vue';
import HeaderComponente from './components/Header.vue';

const app = createApp({});
app.component('primer-componente', MiPrimerComponente);
app.mount('#app');

const header = createApp({});
header.component('hero', HeaderComponente);
header.mount('#header');


