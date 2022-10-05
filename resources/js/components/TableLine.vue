<template>
    <div>
    <tr v-for="(image, index) in images" :key="index" class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-6 text-left whitespace-nowrap">
            <div class="flex items-center">
                <span class="font-medium">Mois / Année</span>
            </div>
        </td>
        <td class="py-3 px-6 text-left">
            <div class="flex items-center">
                <div class="mr-2">
                    <img :src="'/storage/images/' + image" class="w-6 h-6 rounded-full transform hover:scale-1110">
                </div>
            </div>
        </td>
        <td class="py-3 px-6 text-center">
            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Publié</span>
        </td>
        <td class="py-3 px-6 text-center">
            <div class="flex items-center justify-center">
                <input type="radio" name="" id="">
            </div>
        </td>
        <td class="py-3 px-6 text-center">
            <a href="#" class="flex item-center justify-center">
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
            </a>
        </td>
    </tr>
    </div>
</template>
<script setup>
</script>
