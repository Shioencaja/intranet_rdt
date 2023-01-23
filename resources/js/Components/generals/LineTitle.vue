<script setup>
const props = defineProps({
    reverse: Boolean,
    title: String,
});
</script>

<template>
    <div class="flex flex-col w-full" v-if="reverse">
        <div class="line-title-"></div>
        <span class="line-title mt-3">{{ title }} </span>
    </div>

    <div class="flex flex-col w-full" v-else>
        <span class="line-title">{{ title }} </span>
        <div class="line-title- mt-1"></div>
    </div>
</template>
