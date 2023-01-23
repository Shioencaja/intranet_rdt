<script setup>
import Icons from './Icons.vue';
const props = defineProps({
    download: String,
    download_name: String,
    image:String,
});


</script>

<template>

    <div class="flex flex-col items-center justify-center ">
        <img :src="image" alt="" srcset="">
        <div class="mt-5">
            <a :href="download" :download="download_name"
                class="digital-btn px-2 py-1 flex  justify-center items-center text-center cursor-pointer">
                <span class="text-white">DESCARGAR</span>
                <Icons type="down" className="text-white"></Icons>
            </a>
        </div>
    </div>
</template>