<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import TitleCustom from "@/Components/generals/TitleCustom.vue";
import CardCoupon from "@/Components/generals/CardCoupon.vue";
import DividerCustom from "@/Components/generals/DividerCustom.vue";
import SliderCustom from "@/Components/sliders/SliderCustom.vue";
import { onMounted } from "@vue/runtime-core";
import { ref } from 'vue';

const props = defineProps({
    logos: Object,
    logoOthers: Object,
    models: Object,
    products: Object,
    videos: Object,
    advertising: Object,
    slug:String,

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

        <LineTitle title="HERRAMIENTAS DE MARKETING" />

        <div class="my-4 flex justify-center">
            <img src="/images/publi.png" alt="" srcset="" class="w-full" />
        </div>
        <LineTitle title="H. PUBLICITARIAS" />
        <!-- logos -->
        <div class="my-5" id="logos" v-if="logos.length > 0">
            <DividerCustom type="s" />
            <TitleCustom title="LOGOS"></TitleCustom>
            <SliderCustom :data="logos" />
        </div>
        <!-- other logos -->
        <div class="my-5" id="other-logos" v-if="logoOthers.length > 0">
            <DividerCustom type="m" />
            <TitleCustom title="OTROS LOGOS"></TitleCustom>
            <SliderCustom :data="logoOthers" />
        </div>
        <!-- models -->
        <div class="my-5" id="models" v-if="models.length > 0">
            <DividerCustom type="m" />
            <TitleCustom title="MODELOS"></TitleCustom>
            <SliderCustom :data="models" />
        </div>

        <!-- products -->
        <div class="my-5 " id="products" v-if="products.length > 0">
            <DividerCustom type="m" />
            <TitleCustom title="IMAGEN DE PRODUCTO"></TitleCustom>

            <div class="flex flex-col md:flex-row flex-wrap justify-between">
                <template v-for="(item, index) in products" :key="index">
                    <CardCoupon class="w-full" :title="item.title" :content="item.description" :image="item.image_url"
                        :download="item.files?.[0]?.url_patch" :download_name="item.files?.[0]?.origin_name" />
                </template>
            </div>
        </div>
        <!-- products - videos -->
        <div class="my-5" id="product-videos" v-if="videos.length > 0">
            <DividerCustom type="m" />
            <TitleCustom title="VIDEO DE PRODUCTO"></TitleCustom>
            <div class="flex flex-col md:flex-row flex-wrap justify-between">
                <template v-for="(item, index) in videos" :key="index">
                    <CardCoupon class="w-full" :title="item.title" :content="item.description" :image="item.image_url"
                        :download="item.files?.[0]?.url_patch" :download_name="item.files?.[0]?.origin_name"
                        :video='true' />

                </template>
            </div>
        </div>
        <!-- advertising - videos -->
        <div class="my-5" id="video-public" v-if="videos.length > 0">
            <DividerCustom type="m" />
            <TitleCustom title="VIDEOS PUBLICITARIOS"></TitleCustom>
            <div class="flex flex-col md:flex-row flex-wrap justify-between">
                <template v-for="(item, index) in advertising" :key="index">
                    <CardCoupon class="w-full" :title="item.title" :content="item.description" :image="item.image_url"
                        :download="item.files?.[0]?.url_patch" :download_name="item.files?.[0]?.origin_name"
                        :video='true' />

                </template>
            </div>
        </div>

    </Layout>
</template>
