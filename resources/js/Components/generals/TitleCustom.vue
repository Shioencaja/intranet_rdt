<script setup>
const props = defineProps({

    title: String,
});
</script>

<template>
    <span class="title-custom">{{title}}</span>
</template>

<style>
.title-custom {
    font-family: "Inter";
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    color: #696969;
}
</style>
