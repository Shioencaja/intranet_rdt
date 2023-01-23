<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    top: {
        type: Boolean,
        default: true,
    },
    title:String,
    image:String,
});
</script>

<template>
    <div class="flex flex-col items-center justify-center m-0 p-0">
        <div class="look_card" v-if="top">
            <div class="">
                <img :src="image" alt="" />
            </div>
            <div class="p-5">
                <span class="look_card-title uppercase"
                    >{{title}}</span
                >
            </div>
        </div>
        <div class="look_card" v-else>
            <div class="p-5">
                <span class="look_card-title uppercase"
                    >{{title}}</span
                >
            </div>
            <div class="">
                <img :src="image" alt="" />
            </div>
        </div>
    </div>
</template>
