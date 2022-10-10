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
        },
        remove(file) {
            axios.post('api/images/remove/' . file);
        }
    }
}
</script>