<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
</script>

<template>
    <div>
        <div class="flex space-x-5 mb-3">
            <div class="item">
                <img src="/images/test.png" alt="" srcset="" />
            </div>
            <div class="item flex-col">
                <div class=""><span class="t-left">TEST CAPILAR </span></div>
                <div><span class="t-left-s">LORE IPSUM LORE IPSUM </span></div>
                <div><span class="t-left-date">19 NOVIEMBRE </span></div>
            </div>
        </div>
    </div>
</template>
