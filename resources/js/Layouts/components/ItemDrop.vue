<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
    title: String,
    active: Boolean,
    bg: Boolean,
});
const content_b = ref("");
const ToggleContent = async (agent) => {
    if (subMenu.value.classList.contains("active-submenu")) {
        subMenu.value.classList.remove("active-submenu");
    } else {
        subMenu.value.classList.add("active-submenu");
    }
};
</script>

<template>
    <li :class="active ? 'menu-active ' : 'menu-active-'" @click="active = !active">
        <a>
            <div class="flex">
                <slot name="icon"></slot>
                <span class="title-menu "> {{ title }} </span>
            </div>
        </a>
    </li>
    <!-- flex flex-col items-center justify-center -->
    <div
    
        class="p-2 text-center"
        :class="[active ? 'show' : 'hidden', bg ? 'content-ul' : '']"
        style="margin-top: 5px"
        ref="content_b"
    >
        <slot></slot>
    </div>
</template>
