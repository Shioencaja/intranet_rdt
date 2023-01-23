<script setup>
const props = defineProps({
    total: Number,
    title: String,
    className: String,
});
</script>

<template>
    <div
        :className="className"
        class="shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 font-medium group"
    >
        <div
            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12"
        >
            <slot class=""></slot>
        </div>
        <div class="text-right text-white">
            <p class="text-2xl ">{{ total }}</p>
            <p>{{ title }}</p>
        </div>
    </div>
</template>
