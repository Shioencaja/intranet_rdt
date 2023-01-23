<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    title: String,
    routeName: {
        default:'dashboard',
        type:String

    },
    params: Array,
});
</script>

<template>
 
    <li v-if="params">
        <Link :href="route(`${routeName}`,params)" class="txt-item-menu " >{{title}}</Link>
    </li>
    <li v-else>
        <Link :href="route(`${routeName}`)" class="txt-item-menu " :headers="{ foo: bar }">{{title}}</Link>
    </li>
</template>
