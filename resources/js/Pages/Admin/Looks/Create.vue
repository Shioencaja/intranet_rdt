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
    description: "",
    image: "",
});

const submit = () => {
    form.post(route("admin.look_store"), {
        onFinish: () => console.log("first"),
    });
};
</script>

<template>
    <LayoutAdmin>
        <FormCard
            title="REGISTRO DE LOOK & TRENDS"
            :submit="submit"
            back="admin.look"
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
                    Titulo (*)
                </span>
                
            </div>

            <div class="line h-32">
                <textarea
                    class="line__input h-32"
                    id="title"
                    autocomplete="off"
                    type="text"
                    v-model="form.description"
                ></textarea>
                <span for="title" class="line__placeholder">
                    Descripción (*)
                </span>
            </div>

            <div class="line">
                <input
                    class="line__input"
                    autocomplete="off"
                    type="file"
                    @input="form.image = $event.target.files[0]"
                />
                <small class="flex absolute inset-y-0 right-0 items-center pr-3">
                    (240 x 429)
                </small>
            </div>
            <small class="">
                    (240 x 429)
                </small>
        </FormCard>
    </LayoutAdmin>
</template>
