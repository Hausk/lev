import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import AddToCart from './components/AddToCart.vue';
import NavbarCart from './components/NavbarCart.vue';
import ChartLine from './components/ChartLine.vue';
import SideBar from './components/SideBar.vue';
import ImageUploader from './components/ImageUploader.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);
app.component('ChartLine', ChartLine);
app.component('SideBar', SideBar);
app.component('ImageUploader', ImageUploader);

app.mount('#app');