
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    active: Boolean,
    title: String,
    routeName:String,
});
</script>

<template>
    <li :class="active ? 'menu-active' : 'menu-active-'">
        <Link :href="route(`${routeName}`)">
            <div class="flex items-center">
                <slot></slot>
                <span class="title-menu "> {{title}} </span>
            </div>
        </Link>
    </li>
</template>
