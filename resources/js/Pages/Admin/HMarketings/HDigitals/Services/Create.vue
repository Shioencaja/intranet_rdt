<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";
import Icons from "@/components/generals/Icons.vue";
import { ref } from "vue";
const props = defineProps({
    size_file: Number,
       
});

const form = useForm({
    route:'admin.service',
    title: "",
    description: "",
    alias:'service',
    image: "",
    files: [],
});

const sizeFile = ref(parseInt(props.size_file / 1000000));
const typesFile = ["application/pdf", "image/png", "image/jpg", "image/jpeg"];
const uploadFiles = (e) => {
    if (e.target.files[0] != undefined) {
        if (
            e.target.files[0].size < props.size_file &&
            typesFile.includes(e.target.files[0].type)
        ) {
            //1.5mb
            form.files.push(e.target.files[0]);
        } else {
            alert(
                `Tamaño de archivo max ${sizeFile.value} mb, ${typesFile.toString()}`
            );
        }
    }
};

const removeUploadFiles = (ind) => {
    form.files = form.files.filter((item, index) => index != ind);
};

const submit = () => {
    form.post(route("admin.marketing_store"), {});
};
</script>

<template>
    <LayoutAdmin>
        <FormCard
            title="REGISTRO DE MENÚ DE SERVICIO"
            :submit="submit"
            back="admin.service"
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
                <span for="title" class="line__placeholder"> Titulo </span>
            </div>
            <!-- <div class="line h-32">
                <textarea
                    class="line__input h-44"
                    autocomplete="off"
                    id="description"
                    type="text"
                    v-model="form.description"
                ></textarea>
                <span for="description" class="line__placeholder"
                    >Descripción</span
                >
            </div> -->
            <div class="line">
                <input
                    class="line__input"
                    autocomplete="off"
                    type="file"
                    @input="form.image = $event.target.files[0]"
                />
                <small class="flex absolute inset-y-0 right-0 items-center pr-3">
                    (191 x 192)
                </small>
            </div>
            <small class="">
                    (191 x 192)
                </small>
            <hr />
            <p>Archivos</p>

            <div>
                <div class="flex items-center justify-center w-full">
                    <label
                        for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50"
                    >
                        <div
                            class="flex flex-col items-center justify-center pt-5 pb-6"
                        >
                            <svg
                                class="w-10 h-10 mb-3 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                ></path>
                            </svg>
                            <p
                                class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                            >
                                <span class="font-semibold"
                                    >haga clic para cargar</span
                                >
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                PNG, JPG, PDF (MAX. {{sizeFile}}MB)
                            </p>
                        </div>
                        <input
                            id="dropzone-file"
                            type="file"
                            class="hidden"
                            @change="(e) => uploadFiles(e)"
                            accept=".jpg, .jpeg, .png, .pdf"
                        />
                    </label>
                </div>
            </div>

            <div class="my-5">
                <template v-for="(item, index) in form.files" :key="index">
                    <div class="flex w-full shadow-sm py-2">
                        <div class="w-10/12">
                            {{ item?.name }}
                        </div>
                        <div @click="removeUploadFiles(index)" class="cursor-pointer">
                            <Icons
                                type="delete"
                                class="cursor-pointer text-red-400"
                            />
                        </div>
                    </div>
                </template>
            </div>
        </FormCard>
    </LayoutAdmin>
</template>
