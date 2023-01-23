
<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import Icons from '@/components/generals/Icons.vue';
import CardSlider from '@/components/generals/CardSlider.vue';

const props = defineProps({
    data: Object,
    status: String,
});


</script>

<template>
    <div class="mt-5 ">
        <swiper :slidesPerView="1" :spaceBetween="5" :navigation="true" :loop="true" :modules="[Navigation]"
            :breakpoints="{
                '640': {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                '768': {
                    slidesPerView: 3,
                    spaceBetween: 5,
                },
                '1024': {
                    slidesPerView: 3,
                    spaceBetween: 5,
                },
            }" class="swiper">
            <swiper-slide v-for="(item , index) in data " :key="index">
                <CardSlider :image="item.image_url" :download="item.files?.[0]?.url_patch" :download_name="item.files?.[0]?.origin_name"></CardSlider>
            </swiper-slide>
            
           
            
        </swiper>
    </div>
</template>
  
<style>
.swiper {
    width: 100%;
    height: 100%;
    /* padding: 0 5px; */
}

.swiper-slide {

    text-align: center;
    /* font-size: 18px; */
    /* background: #fff; */

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;

}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.swiper-button-next,
.swiper-button-prev {
    color: #707070;

}


/* the new container */
/* .swiper-container {
    position: relative;
    width: 100%;
    padding: 0 40px;
} */

/* fix the buttons positions */


.swiper-button-prev {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translatey(-50%);
    
    cursor: pointer;
}

.swiper-button-next {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translatey(-50%);
    z-index: 10;
    cursor: pointer;
}
.swiper-button-next:after{
    font-size:20px !important;
    font-weight: 900;
}
.swiper-button-prev:after{
    font-size:20px !important;
    font-weight: 900;
}
</style>