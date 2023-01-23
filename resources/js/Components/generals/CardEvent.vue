<script setup>
const props = defineProps({
    titleNumber: Number,
    number: Number,
    title: String,
    image: String,
});
</script>

<template>
    <div class="event_card my-3">
        <p class="p-2 event_card-number-event">EVENTO {{titleNumber}}</p>
        <img :src="image" alt="" class="p-1" />
        <div class="p-3">
            <div class="flex">
                <div><span class="event_card_number">{{number}}</span></div>
                <!-- <div class="line-vertical"></div> -->
                <div class="ml-1 mr-5 w-0.5 bg-gray-500"></div>
                <div class="uppercase  self-center">
                    <p class="event_card-title">{{title}}</p>
                </div>
            </div>
        </div>
    </div>
</template>
