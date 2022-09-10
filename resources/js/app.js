import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import AddToCart from './components/AddToCart.vue';
import NavbarCart from './components/NavbarCart.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);

app.mount('#app');