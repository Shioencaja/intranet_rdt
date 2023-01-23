<script setup>
import ItemCourseH from "@/Components/cards/ItemCourseH.vue";
import ItemDoc from "@/Components/cards/ItemDoc.vue";
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
</script>

<template>
    <template v-for="(index) in 3" :key="index">
        <ItemCourseH />
    </template>
    <div class="flex justify-between">
        <p class="t_document">DOCUMENTOS</p>
        <p class="t_more">VER TODOS</p>
    </div>

    <div class="mt-5">
        <template v-for="(index) in 5" :key="index">
            <ItemDoc></ItemDoc>
        </template>
    </div>
</template>