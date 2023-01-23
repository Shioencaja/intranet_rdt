<script setup>
import Icons from "@/components/generals/Icons.vue";
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    links: Object,
    total:Number,
});
</script>

<template>

   <div class="flex overflow-x-auto">
     <nav aria-label="Page navigation" v-if="total > 10">
        <ul class="inline-flex items-center -space-x-px mt-3">
            <li>
                <Link
                    :href="links[0].url"
                    class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700  "
                >
                    <Icons type="left" class="w-4 h-4"></Icons>
                </Link>
            </li>
            <li v-for="(item, index) in links" :key="index">
                <Link 
                    v-if="item.label != '>' && item.label != '<'"
                    :href="item.url"
                    :class="
                        item.active
                            ? 'z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white'
                            : 'text-gray-500 py-2 px-3 leading-tight bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700  '
                    "
                    >{{ item.label }}</Link
                >
            </li>
            <li>
                <Link
                     :href="links[links.length - 1].url"
                    class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700  "
                >
                    <Icons type="right"></Icons>
                </Link>
            </li>
        </ul>
    </nav>
   </div>
</template>
