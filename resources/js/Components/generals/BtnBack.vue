
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Icons from '@/components/generals/Icons.vue';
const props = defineProps({
    canResetPassword: Boolean,
    back: String,
});


</script>

<template>
    <div class="justify-start flex mt-2 fixed z-50">
            <Link :href="route(`${back}`)"
                ><button
                    class="min-w-auto px-5 h-10 bg-gray-500 p-2 rounded-r-full hover:bg-gray-600 text-white font-semibold transition-all duration-200 ease-in-out"
                >
                    <Icons type="left"></Icons></button
            ></Link>
        </div>
</template>