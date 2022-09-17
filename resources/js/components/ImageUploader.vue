<style>
    .filepond--credits {
        display: none;
    }
    .filepond--root {
        margin: 0;
    }
</style>
<template>
    <div>
        <div class="mt-4 w-full lg:w-3/4 mx-auto" style="width: 500px !important;">
            <file-pond
                name="image"
                ref="pond"
                allowMultiple="true"
                label-idle="Clique pour placer ou glisse les photos"
                @init="filepondInitialized"
                accepted-file-types="image/jpg, image/jpeg, image/png"
                @processfile="handleProcessedFile"
                max-file-size="6MB"
                imagePreviewMaxHeight="500"
                instantUpload="false"
                credits="false"
            />
        </div>
        <!-- component -->
        <div class="mt-8">
            <h3 class="text-2xl font-medium text-center">Liste des Photos</h3>
        </div>
        <div class="overflow-x-auto">
            <div class="min-w-screen min-h-screen bg-gray-100 items-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-full lg:w-3/4 m-auto">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Date</th>
                                    <th class="py-3 px-6 text-left">Image</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Publish</th>
                                    <th class="py-3 px-6 text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import vueFilePond, { setOptions } from 'vue-filepond';
import "filepond/dist/filepond.min.css";
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

let serverMessage = {};
setOptions({
    server: {
        process: {
            url: 'api/images/upload',
            onerror: (response) => {
                serverMessage = JSON.parse(response);
            }
        },
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    },
    labelFileProcessingError: () => {
        return serverMessage.error;
    }
});

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginFileValidateSize, FilePondPluginImagePreview);

export default {
    components: {
        FilePond,
    },
    data() {
        return {
            images: []
        }
    },
    mounted() {
        axios.get('api/images/show')
            .then((response) => {
                this.images = response.data;
            })
            .catch((error) => {
                console.error(error);
            });
    },
    methods: {
        filepondInitialized() {
            console.log('Filepond is ready!');
            console.log('Filepond object:', this.$refs.pond);
        },
        handleProcessedFile(error, file) {
            if (error) {
                console.error(error);
                return;
            }
            // add the file to our images array
            this.images.unshift(file.serverId);
        }
    }
}
</script>