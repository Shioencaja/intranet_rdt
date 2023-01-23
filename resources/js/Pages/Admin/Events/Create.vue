<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";
const props = defineProps({
    canResetPassword: Boolean,
    errors: Object,
});

const form = useForm({
    title: "",
    date: "",
    hour: "",
    description: "",
    image: "",
});

const submit = () => {
    form.post(route("admin.event_store"), {
        onFinish: () => console.log("first"),
    });
};
</script>

<template>
    <LayoutAdmin>
        <FormCard
            title="REGISTRO DE EVENTO"
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
                    @input="form.image = $event.target.files[0]"
                />
                
                <small class="flex absolute inset-y-0 right-0 items-center pr-3">
                    (813 x 372)
                </small>
                
            </div>
            <small class="">
                    (813 x 372)
                </small>
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
