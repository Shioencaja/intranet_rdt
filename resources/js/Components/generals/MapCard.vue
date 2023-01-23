<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});


</script>

<template>
    <div class="line-map"></div>
    <div class="flex mt-1">
        <a href="http://www.placentaliferadiant.com/" target="_blank" rel="noopener noreferrer">
            <div class="bg-[url('/images/maps.png')] b-map flex items-center justify-center">
                <span class="b-map-title">VER EN MAPS</span>
            </div>
        </a>
        <div class="ml-3 mr-5 w-0.5 my-1 bg-gray-400"></div>
        <div>
            <a href="http://www.placentaliferadiant.com/" target="_blank" rel="noopener noreferrer">
                <div><span class="map-title-xs">SALONES</span></div>
                <div><span class="map-title-xs">RADIANT</span></div>
            </a>
            <div class="line-map"></div>
            <div>
                <a href="http://www.placentaliferadiant.com/" target="_blank" rel="noopener noreferrer">
                    <span class="map-title-xs">TEST CAPILAR</span>
                </a>
            </div>
        </div>
    </div>
    <div class="line-map mt-1"></div>
</template>

<style>
.b-map {

    width: 85px;
    height: 82px;


    /* background: rgba(0, 0, 0, 0.52); */
}

.b-map-title {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 9px;
    line-height: 10px;
    /* identical to box height, or 125% */

    text-align: center;

    color: #FFFFFF;
}

.line-map {
    width: 100%;
    height: 0px;
    border: 1px solid #B0B1B1;
}

.map-title-xs {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 17px;
    /* identical to box height */


    color: #707070;
}
</style>