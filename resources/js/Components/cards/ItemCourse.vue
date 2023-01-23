<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
    img:String,
});
</script>

<template>
    <div class="">
        <img :src="img" alt="" srcset="" />
        <div class=""><span class="t-left">TEST CAPILAR </span></div>
        <div><span class="t-left-s">LORE IPSUM LORE IPSUM </span></div>
        <div><span class="t-left-date">19 NOVIEMBRE </span></div>
    </div>
</template>
