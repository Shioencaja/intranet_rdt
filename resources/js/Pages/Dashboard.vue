<script>
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
};
</script>
<script setup>
import Layout from "../Layouts/Layout.vue";
import Menu_Right from "@/Components/pages/menus/Menu_Right.vue";
import ItemCourse from "../Components/cards/ItemCourse.vue";
import { Navigation, Pagination } from "swiper";

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
</script>
<template>
    <Layout>
        <!-- <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="index.html">Cursos</a>
                        </li>
                        <li class="active">
                            <a href="#">Últimos cursos </a>
                        </li>
                    </ul>
                </div>
            </div> -->
        <swiper
            :modules="[Navigation, Pagination]"
            :slides-per-view="1"
            :space-between="50"
            :navigation="true"
            :pagination="{ clickable: true }"
        >
            <swiper-slide
                ><img
                    src="/images/carrusel/banner_hair-care.jpg"
                    class="text-center object-cover w-full"
            /></swiper-slide>
            <swiper-slide
                ><img
                    src="/images/carrusel/banner_hair-color.jpg"
                    class="text-center object-cover w-full"
            /></swiper-slide>
            <swiper-slide
                ><img
                    src="/images/carrusel/banner_salon-treatment.jpg"
                    class="text-center object-cover w-full"
            /></swiper-slide>
            ...
        </swiper>
        <!--<div class="flex">
            <img src="/images/a.png" class="text-center object-cover w-full" />
        </div>-->
        <p class="title-last-curso mt-10">TUS ÚLTIMOS CURSOS</p>
        <div class="line-d"></div>
        <div
            class="flex flex-col md:flex-row justify-center items-center md:justify-between my-5"
        >
            <template v-for="index in 3" :key="index">
                <ItemCourse img="/images/course.png" class="p-2"></ItemCourse>
            </template>
        </div>

        <p class="title-last-curso mt-10">NOTICIAS</p>
        <div class="line-d"></div>
        <div
            class="flex flex-col md:flex-row justify-center items-center md:justify-between my-5"
        >
            <template v-for="index in 3" :key="index">
                <ItemCourse img="/images/now.png" class="p-1"></ItemCourse>
            </template>
        </div>

        <!-- <div class="item flex-1">
                    <Menu_Right></Menu_Right>
                </div> -->
    </Layout>
</template>
