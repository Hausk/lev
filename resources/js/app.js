import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import SideBar from './components/SideBar.vue';
import TableLine from './components/TableLine.vue';

import 'flowbite/dist/flowbite.js';
import 'flowbite/dist/flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);
app.component('ChartLine', ChartLine);
app.component('SideBar', SideBar);
app.component('TableLine', TableLine);

app.mount('#app');