
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    prev: String,
    next: String,
});
</script>

<template>
    <!-- Previous Button -->
    <Link
        :href="prev"
        class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
    >
        Atras
    </Link>

    <!-- Next Button -->
    <Link
        :href="next"
        class="inline-flex items-center py-2 px-4 ml-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
    >
        Siguiente
    </Link>
</template>
