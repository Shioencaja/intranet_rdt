<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import Icons from "@/Components/generals/Icons.vue";
import { Link } from '@inertiajs/inertia-vue3';
import CardOption from "./CardOption.vue";

const props = defineProps({});
</script>

<template>
    <Layout>
        <LineTitle title="HERRAMIENTAS DE MARKETING" />
        <div class="flex justify-around">
            <CardOption />
        </div>
    </Layout>
</template>
