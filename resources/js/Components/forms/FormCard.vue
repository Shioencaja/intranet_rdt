import JetInputError from '@/Components/InputError.vue';
<script setup>
import Icons from "../generals/Icons.vue";
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    canResetPassword: Boolean,
    title: String,
    submit: Function,
    back: String,
});


</script>

<template>
    <div class="flex flex-col justify-between md:h-full bg-white">
        <div class="justify-start flex mt-2">
            <Link :href="route(`${back}`)"
                ><button
                    class="min-w-auto px-5 h-10 bg-gray-500 p-2 rounded-r-full hover:bg-gray-600 text-white font-semibold transition-all duration-200 ease-in-out"
                >
                    <Icons type="left"></Icons></button
            ></Link>
        </div>
        <!-- form header -->
        <div class="my-4">
            <h3 class="text-center title-page">{{ title }}</h3>
        </div>

        <form action="" method="post" @submit.prevent="submit">
            <!-- form body -->
            <div class="py-2 px-5 md:px-20 flex-1 space-y-4">
                <slot />
            </div>

            <div class="bg-gray-10 p-6 pt-5 flex justify-center space-x-3">
                <Link :href="route(`${back}`)"
                    class="p-2 px-4 rounded bg-gray-500 text-white hover:text-white"
                    type="button"
                >
                    Cancelar
                </Link>
                <button type="submit" class="button bg-blue-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>
