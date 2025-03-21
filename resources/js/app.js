import './bootstrap';
import { createApp } from 'vue';
import MiPrimerComponente from './components/PrimerComponente.vue';

const app = createApp({});
app.component('primer-componente', MiPrimerComponente);
app.mount('#app');
