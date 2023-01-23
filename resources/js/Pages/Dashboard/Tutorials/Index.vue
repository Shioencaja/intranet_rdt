<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import ModalCustom from "@/Components/generals/ModalCustom.vue";
import DocumentStatic from "@/Components/generals/DocumentStatic.vue";
import MapCard from "@/Components/generals/MapCard.vue";
import { ref } from 'vue';


const props = defineProps({
    tutorials: Object,
    line: Object,
});

const showModal = ref(false)
const embed = ref(null)

const openModel = async (em) => {
    showModal.value = !showModal.value
    embed.value = em;
}
const closeModal = async (event) => {
    showModal.value = !showModal.value
    embed.value = null;
}




</script>

<template>
    <Layout>

        
            <LineTitle title="TUTORIALES" />
            <div class="my-5 p-3 w-full">
                <img :src="line.image_url" alt="" class="w-full" srcset="">
            </div>
            <div class="flex flex-col md:flex-row flex-wrap">
                <template v-for="(item, index) in tutorials" :key="index">
                    <div class="p-3  w-full md:w-2/6">
                        <div class="-z-50 disable-frame pointer-events-none  h-64 ">
                            <iframe :src="`https://www.youtube.com/embed/${item.embed}`" frameborder="0"
                                class="w-full h-full">
                            </iframe>
                        </div>
                        <div class="bg-white  p-3 text-center">
                            <P class="mar_card_sub text-gray-500 ">{{ item.title }}</P>
                            <button @click="openModel(item.embed)"
                                class="bg-gray-500 hover:bg-gray-600 px-4 py-2  text-white focus:outline-none rounded-lg mt-2">
                                VER TUTORIAL
                            </button>
                        </div>
                    </div>
                </template>
            </div>
       
        <template #modal>
            <ModalCustom :show="showModal" v-on:close="closeModal">
                <div class="w-full h-96 flex justify-center " v-if="embed">
                    <iframe :src="`https://www.youtube.com/embed/${embed}`" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen class="w-full h-full"></iframe>
                </div>
            </ModalCustom>
        </template>
    </Layout>
</template>

<style>
.disable-frame {
    pointer-events: none !important;

}

.disable-frame>.ytp-button {
    display: none;
}
</style>
