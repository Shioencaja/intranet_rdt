<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});


</script>

<template>
    <tr class="hover:bg-gray-100 border-b border-gray-200 py-2">
        <slot></slot>
    </tr>
</template>