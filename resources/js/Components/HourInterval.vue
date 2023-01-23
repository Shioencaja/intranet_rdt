<script setup>
import moment from "moment";
import { onBeforeUpdate, onMounted, onUnmounted, ref } from "vue";
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
const h = ref(moment().format("h:mm:ss a"));
const interval = ref(null);
onMounted(() => {
    interval.value = setInterval(() => {
        h.value = moment().format("h:mm:ss a");
    }, 1000);
    clearInterval(interval);
});

</script>

<template><span class="s-hour uppercase">{{ h }}</span></template>
