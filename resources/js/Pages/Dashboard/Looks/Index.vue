<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import LookCard from "@/Components/generals/LookCard.vue";
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    looks: Object,
    status: String,
});
function topIndex(index){
    return index % 2 == 0 ?true:false;
}
</script>

<template>
    <Layout>
        
            <LineTitle title="LOOKS & TRENDS" />
            <div class="flex flex-wrap justify-center md:justify-between gap-5">
                <template v-for="(item, index) in looks.data" :key="index">
                    <Link :href="route('look.show',item.id)" class="cursor-pointer">
                        <LookCard
                            :title="item.title"
                            class="my-3"
                            :top="topIndex(index)"
                            :image="item.image_url"
                        ></LookCard>
                    </Link>
                </template>
            </div>
    </Layout>
</template>
