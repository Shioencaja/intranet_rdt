<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    name: String,
});
</script>

<template>
    <th class="px-2 py-3 bg-gray-500   " style="background-color: #f8f8f8">
        <slot></slot>
    </th>
</template>
