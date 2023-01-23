<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import TitleCustom from "@/Components/generals/TitleCustom.vue";
import CardCoupon from "@/Components/generals/CardCoupon.vue";
import SliderCustom from "@/Components/sliders/SliderCustom.vue";
import DividerCustom from '@/Components/generals/DividerCustom.vue';
import CardOption from "./CardOption.vue";
import { onMounted, onUpdated, ref } from 'vue';

const props = defineProps({
    coupons: Object,
    redes: Object,
    videos: Object,
    cards: Object,
    posters: Object,
    services: Object,
    status: String,

    slug: String,
});
const timeOut = ref()
onMounted(() => {
    timeOut.value = setTimeout(() => {
        scrollToBottom()
    }, 50)
})

function scrollToBottom() {
    document.getElementById(`${props?.slug}`).scrollIntoView({ behavior: "smooth", block: "center", inline: "nearest" });
     clearTimeout(timeOut);
}

</script>

<template>
    <Layout>
        <div id="digital">

            <LineTitle title="HERRAMIENTAS DE MARKETING" />

            <div class="my-4 flex justify-center">
                <img src="/images/digital.png" alt="" srcset="" class="w-full" />
            </div>

            <LineTitle title="H. DIGITALES" />
            <!-- coupons -->
            <div class="my-5" id="cupones" v-if="coupons.length > 0">
                <DividerCustom type="s" />
                <TitleCustom title="CUPONES"></TitleCustom>

                <div class="flex flex-col md:flex-row flex-wrap justify-between">
                    <template v-for="(item, index) in coupons" :key="index">
                        <CardCoupon class="w-full" :title="item.title" :content="item.description"
                            :image="item.image_url" :download="item.files?.[0]?.url_patch"
                            :download_name="item.files?.[0]?.origin_name" />

                    </template>
                </div>
            </div>
            <!-- images redes -->
            <div class="my-5" id="imagenes" v-if="redes.length > 0">
                <DividerCustom type="m" />
                <TitleCustom title="IMÁGENES DE REDES SOCIALES"></TitleCustom>

                <div class="flex flex-col md:flex-row flex-wrap justify-between">
                    <template v-for="(item, index) in redes" :key="index">
                        <CardCoupon class="w-full" :title="item.title" :content="item.description"
                            :image="item.image_url" :download="item.files?.[0]?.url_patch"
                            :download_name="item.files?.[0]?.origin_name" />

                    </template>
                </div>
            </div>
            <!-- videos redes -->
            <div class="my-5" id="videos" v-if="videos.length > 0">
                <DividerCustom type="m" />
                <TitleCustom title="VIDEOS DE REDES SOCIALES"></TitleCustom>

                <div class="flex flex-col md:flex-row flex-wrap justify-between">
                    <template v-for="(item, index) in videos" :key="index">
                        <CardCoupon class="w-full" :title="item.title" :content="item.description"
                            :image="item.image_url" :download="item.files?.[0]?.url_patch"
                            :download_name="item.files?.[0]?.origin_name" :video='true' />

                    </template>
                </div>
            </div>
            <!-- cards -->
            <div class="my-5 fidelizacion" id="fidelizacion" v-if="cards.length > 0">
                <DividerCustom type="m" />
                <TitleCustom title="TARJETAS DE FIDELIZACIÓN"></TitleCustom>
                <SliderCustom :data="cards" />
            </div>
            <!-- posters -->
            <div class="my-5 poster" id="poster" v-if="posters.length > 0">
                <DividerCustom type="m" />
                <TitleCustom title="PÓSTER"></TitleCustom>
                <SliderCustom :data="posters" />
            </div>
            <!-- services -->
            <div class="my-5" id="services" v-if="services.length > 0">
                <DividerCustom type="m" />
                <TitleCustom title="MENÚ DE SERVICIO"></TitleCustom>
                <SliderCustom :data="services" />
            </div>
        </div>
    </Layout>
</template>
