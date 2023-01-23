<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    type: String,
});


</script>

<template>
    <div class="my-10" v-if="type == 's'"></div>
    <div class="my-20"  v-if="type == 'm'"></div>
    <div class="my-5" v-else></div>
</template>