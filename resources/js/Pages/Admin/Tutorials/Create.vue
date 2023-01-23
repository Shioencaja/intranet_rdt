<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";
const props = defineProps({
    lines: Object,
    errors: Object,
});

const form = useForm({
    title: "",
    embed: "",
    line:"",
    
});

const submit = () => {
    form.post(route("admin.tutorial_store"), {
        onFinish: () => console.log("first"),
    });
};
</script>

<template>
    <LayoutAdmin>
        <FormCard
            title="REGISTRO DE TUTORIAL"
            :submit="submit"
            back="admin.tutorial"
        >
            <ErrorsValidate></ErrorsValidate>
            <div class="line">
                <select
                    class="line__input"
                    id="title"
                    autocomplete="off"
                    type="text"
                    v-model="form.line"
                >
                <template v-for="(item, index) in lines " :key="index">
                    <option :value="item.id">{{item.line}}</option>
                </template>
                </select>
                <span for="title" class="line__placeholder">
                    linea (*)
                </span>
            </div>
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
            
            
            <div class="line">
                <input
                    class="line__input"
                    id="embed"
                    autocomplete="off"
                    type="text"
                    v-model="form.embed"
                />
                <span for="embed" class="line__placeholder">
                    URL VIDEO YOUTUBE
                </span>
            </div>
            
        </FormCard>
    </LayoutAdmin>
</template>
