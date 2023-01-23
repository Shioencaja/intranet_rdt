<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import CardEvent from "@/Components/generals/CardEvent.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import PaginateSimple from "../../../shared/PaginateSimple.vue";
const props = defineProps({
    events: Object,
    status: String,
    paginate: Number,
});

// const eventsTemp = ref(props?.events.data);

// const more = async (agent) => {
//     const resp = await axios.get("/dashboard/xxxx/old?page=2");
//     resp.data.data.forEach((item, index) => {
//         eventsTemp.value = [...eventsTemp.value, item];
//     });
// };
</script>

<template>
    <Layout>
        
            <LineTitle title="EVENTOS" />
            <div class="flex flex-wrap justify-center md:justify-between gap-5 mt-5">
                <template v-for="(item, index) in events.data" :key="index">
                    <Link :href="route('event.show',item.id)">
                        <CardEvent
                            class=""
                            :titleNumber="index + 1"
                            :image="item.image_url"
                            :title="item.title"
                            :number="dateDay(item.date)"
                        ></CardEvent>
                    </Link>
                </template>
            </div>

            <div class="flex justify-center" v-if="events.total > paginate">
                <PaginateSimple
                    :prev="events.prev_page_url"
                    :next="events.next_page_url"
                ></PaginateSimple>
            </div>
        
    </Layout>
</template>
