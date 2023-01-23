<script setup>
const props = defineProps({
    image: String,
    number: Number,
    title: String,
    date: String,
    hour:String,
});
</script>

<template>
    <div class="">
        
        <img :src="image" alt="" srcset="" class="w-full"/>
        <div class="event_card-show p-5">
            <div class="flex items-center">
                <span class="event_card-show-number">{{number}}</span>
                <span class="event_card-show-title ml-5">{{title}}</span>
            </div>
            <div class="">
                <span class="mx-2 event_card-show-date"
                >{{date}} a {{hour}}</span
            >
            </div>
        </div>
    </div>
</template>
