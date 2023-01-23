<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import { Link } from "@inertiajs/inertia-vue3";
import LookCard from "@/Components/generals/LookCard.vue";
const props = defineProps({
    look: Object,
    last: Object,
});

function topIndex(index) {
    return index % 2 == 0 ? true : false;
}
</script>

<template>
    <Layout>
        <LineTitle title="LOOKS & TRENDS" />
        <div class="">
            <div class="my-5">
                <span class="line-title lg:text-2xl">{{ look?.title }} </span>
            </div>
            <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 items-center md:items-start"
            >
                <div class="">
                    <img
                        :src="look?.image_url"
                        alt=""
                        style="height: 429px; width: 240px"
                    />
                </div>
                <div class="md:w-8/12 lg:w-9/12 md:pl-5">
                    <p class="event_card-show-detail">
                        {{ look?.description }}
                    </p>
                </div>
            </div>
        </div>

        <LineTitle title="ÚLTIMOS TRENDS" class="mt-10" />

        <div
            class="flex flex-wrap justify-center md:justify-start xl:justify-between gap-5"
        >
            <template v-for="(item, index) in last" :key="index">
                <Link
                    :href="route('look.show', item.id)"
                    class="cursor-pointer"
                >
                    <LookCard
                        :title="item.title"
                        class="my-3 w-full"
                        :top="topIndex(index)"
                        :image="item.image_url"
                    >
                    </LookCard>
                </Link>
            </template>
        </div>

        <div class="flex justify-center my-5">
            <Link
                :href="route('look')"
                class="bg-gray-700 hover:bg-gray-800 rounded-full py-2 px-6"
            >
                <span class="text-white">VER MÁS</span>
            </Link>
        </div>
    </Layout>
</template>
