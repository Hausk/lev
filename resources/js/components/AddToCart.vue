<template>
    <div class="flex items-center justify-between py-4">
        <button class="bg-indigo-500 text-white p-2" v-on:click.prevent="addToCart">Ajouter au panier</button>
    </div>
</template>
<script setup>
    import { TinyEmitter } from 'tiny-emitter';
    import useProduct from '../composables/products/';

    const { add } = useProduct();
    const productId = defineProps(['productId']);

    const addToCart = async () => {
        await axios.get('/sanctum/csrf-cookie')
        await axios.get('/api/user')
            .then(async (res) => {
                let cartCount = await add(productId);
                TinyEmitter.emit('refreshCartCount', cartCount);
            })
            .catch(err => console.log(err));
    }
</script>