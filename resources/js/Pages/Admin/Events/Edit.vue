<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";
import { ref } from 'vue';
const props = defineProps({
    canResetPassword: Boolean,
    errors: Object,
    event: Object,
});

const form = useForm({
    title: props.event?.title,
    date: props.event?.date,
    hour: props.event?.hour,
    description: props.event?.description,
    image: "",
});
const imageShow = ref(props?.event?.image_url);
const imageTemp = ref(null);
const submit = () => {
    form.image = imageTemp.value;
    form.post(route("admin.event_update", props.event?.id), {
        onFinish: () => console.log("first"),
    });
};
</script>

<template>
    <LayoutAdmin>
        {{imageTemp}}
        <FormCard
            title="EDITAR  EVENTO"
            :submit="submit"
            back="admin.event"
        >
            <ErrorsValidate></ErrorsValidate>
            <div class="line">
                <input
                    class="line__input"
                    id="title"
                    autocomplete="off"
                    type="text"
                    v-model="form.title"
                />
                <span for="title" class="line__placeholder">
                    Nombre evento
                </span>
            </div>
            <div class="line">
                <input
                    class="line__input"
                    id="date"
                    autocomplete="off"
                    type="date"
                    v-model="form.date"
                />
                <span for="date" class="line__placeholder"> Fecha </span>
            </div>

            <div class="line">
                <input
                    class="line__input"
                    id="hour"
                    autocomplete="off"
                    type="time"
                    v-model="form.hour"
                />
                <span for="hour" class="line__placeholder"> Hora </span>
            </div>
            <div class="line">
                <input
                    class="line__input"
                    autocomplete="off"
                    type="file"
                    @input="imageTemp = $event.target.files[0]"
                />
                <small class="flex absolute inset-y-0 right-0 items-center pr-3">
                    (813 x 372)
                </small>
            </div>
            <small class="">
                    (813 x 372)
                </small>
            <div class="flex">
                <img class="border-2 rounded-sm" :src="imageShow"/>
            </div>
            <div class="line h-32">
                <textarea
                    class="line__input h-44"
                    autocomplete="off"
                    id="description"
                    type="text"
                    v-model="form.description"
                ></textarea>
                <span for="description" class="line__placeholder">Detalle</span>
            </div>
        </FormCard>
    </LayoutAdmin>
</template>
