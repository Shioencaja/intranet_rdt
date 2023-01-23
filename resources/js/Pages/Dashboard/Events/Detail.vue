<script setup>
import Layout from "@/Layouts/Layout.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import CardEvent from "@/Components/generals/CardEvent.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import CardShowEvent from "@/Components/generals/CardShowEvent.vue";
import Icons from "../../../Components/generals/Icons.vue";
import BtnBack from "../../../Components/generals/BtnBack.vue";

const props = defineProps({
    event: Object,
});
</script>

<template>
    <Layout>
        <div class="">
            <LineTitle title="EVENTOS" />
            <BtnBack :back="`event`" class="-t-10"></BtnBack>
            <div class="my-2"></div>
            <CardShowEvent :title="event?.title" :image="event?.image_url" :number="dateDay(event?.date)"
                :date="dateCustomHour(event?.date)" :hour="dateHour(event?.hour, event?.date)"></CardShowEvent>

            <div class="my-5"></div>
            <LineTitle title="DETALLES" :reverse="true" />

            <div class="my-12">
                <p class="event_card-show-detail">
                    {{ event?.description }}
                </p>
            </div>

            <LineTitle title="INCRIPCIONES AQUÍ" :reverse="true" />

            <!-- Secondary -->
            <div class="flex justify-center my-5">
                <button type="button"
                    class="flex break-inside bg-black hover:bg-gray-900 rounded-3xl px-8 py-4 mb-4 w-full md:w-1/4">
                    <div class="flex items-center justify-between flex-1">
                        <span class="text-lg font-medium text-white">Inscribirme</span>
                        <Icons type="right-"></Icons>
                    </div>
                </button>
            </div>

        </div>
    </Layout>
</template>
