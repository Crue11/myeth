import './bootstrap';
import FlipCard from './components/FlipCard.vue';
const {createApp} = Vue;

const app = createApp({});

app.component('flip-card', FlipCard);

app.mount('#app');
