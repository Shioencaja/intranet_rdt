
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Icons from '@/Components/generals/Icons.vue';
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
    add:String,
    titlePage:{
        type: String,
        required:false
    }
});
</script>

<template>
    <div class="bg-white p-4 rounded-md w-full">
    
        <p class="title-page text-center">{{titlePage}}</p>
        <div class="flex justify-end">
            <Link :href="route(`${add}`)"
                ><button
                    class="min-w-auto px-5 h-10 bg-blue-500 p-2 rounded-l-full hover:bg-blue-600 text-white font-semibold transition-all duration-200 ease-in-out"
                >
                    <Icons type="add"></Icons></button
            ></Link>
        </div>
        <slot name="search"> </slot>
        <div class="overflow-x-auto mt-6 bg-white">
            <table
                class="table-auto border-collapse w-full sm:bg-white rounded-lg overflow-hidden shadow-md my-2"
            >
                <thead class="">
                    <tr
                        class="rounded-l-lg sm:rounded-none"
                        style="font-size: 0.9674rem"
                    >
                        <slot name="thead"></slot>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                    <slot name="tbody"></slot>
                </tbody>
            </table>
        </div>
        <slot name="pag"></slot>
    </div>
</template>
