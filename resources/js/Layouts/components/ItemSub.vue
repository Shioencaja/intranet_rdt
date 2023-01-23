
<script setup>
import { ref } from 'vue';
const props = defineProps({
    title: String,
    active:Boolean
});
const subMenu = ref("");
const ToggleContent = async (agent) => {
    if (subMenu.value.classList.contains("active-submenu")) {
        subMenu.value.classList.remove("active-submenu");
    } else {
        subMenu.value.classList.add("active-submenu");
    }
};
</script>

<template>
    <li :class="active?'active-submenu':''" ref="subMenu" @click="ToggleContent">
        <a  class="content-ul title-submenu"> {{title}}</a>
        <ul class="content-ul " style="margin-top: 10px">
            <div
                class="mt-3 flex justify-center flex-col items-center space-y-1 "
            >
                <slot></slot>
            </div>
        </ul>
    </li>
</template>
