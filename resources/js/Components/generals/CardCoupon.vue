<script setup>
import Icons from '@/Components/generals/Icons.vue';
const props = defineProps({
    title: String,
    content: String,
    image: String,
    download: String,
    download_name: String,
    video: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 my-3">
        <div>

            <video class="digital-image" controls v-if="video">
                <source :src="download" type="video/mp4">
                Tu navegador no soporta los vídeos de HTML5
            </video>
            <img :src="image" alt="" class="digital-image" srcset="" v-else />
        </div>
        <div class="flex flex-col md:mx-3 justify-around w-full md:w-60 px-2">
            <div><span class="digital-card-title"> {{ title }} </span></div>
            <div class="">
                <p class="digital-card-content " v-if="content">
                    {{ content }}
                </p>

            </div>
            <div class="mt-2 md:mt-0">
                <!-- <button class="digital-btn px-5 py-1 flex items-center "> DESCARGAR <Icons type="down"></Icons></button> -->
                <a :href="download" :download="download_name"
                    class="digital-btn px-2 py-1 flex  justify-center items-center text-center cursor-pointer">
                    <span class="text-white">DESCARGAR</span>
                    <Icons type="down" className="text-white"></Icons>
                </a>
            </div>
        </div>
    </div>
</template>
