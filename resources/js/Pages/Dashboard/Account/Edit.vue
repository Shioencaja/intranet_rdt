<script setup>
import Layout from "@/Layouts/Layout.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";
const props = defineProps({
    errors: Object,
    business_type: Object,
    user: Object,
});

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
    role: props.user?.role,
    enabled: props.user?.enabled,
    password: null,
    password_confirmation: "",
    terms: false,

    date_birth: props.user?.person?.date_birth,
    surnames: props.user?.person?.surnames,
    gender: props.user?.person?.gender,
    address: props.user?.person?.address,
    country: props.user?.person?.country,
    district: props.user?.person?.district,
    phone: props.user?.person?.phone,
    business_type: props.user?.person?.business_type,

    back:'profile'
});

const submit = () => {
    form.post(route("admin.user_update", props?.user?.id), {
        onFinish: () => console.log("first"),
    });
};
</script>

<template>
    <Layout>

        <FormCard title="DATOS" :submit="submit" back="dashboard" class="w-full">
            <ErrorsValidate></ErrorsValidate>

            <div class="flex flex-col md:flex-row md:space-x-5 md:space-y-0 space-y-3 w-full">
                <div class="line md:w-1/2">
                    <input class="line__input" id="name" autocomplete="off" type="text" v-model="form.name" />
                    <span for="name" class="line__placeholder"> Nombre </span>
                </div>

                <div class="line md:w-1/2">
                    <input class="line__input" id="surnames" autocomplete="off" type="text" v-model="form.surnames" />
                    <span for="surnames" class="line__placeholder">
                        Apellidos
                    </span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-5 md:space-y-0 space-y-3">
                <div class="line md:w-1/2">
                    <input class="line__input" id="date_birth" autocomplete="off" type="date"
                        v-model="form.date_birth" />
                    <span for="date_birth" class="line__placeholder">
                        F. Nacimiento
                    </span>
                </div>

                <div class="line md:w-1/2">
                    <select class="line__input" id="gender" autocomplete="off" type="text" v-model="form.gender">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                    <span for="gender" class="line__placeholder"> Sexo </span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-5 md:space-y-0 space-y-3">
                <div class="line md:w-1/2">
                    <input class="line__input" id="address" autocomplete="off" type="text" v-model="form.address" />
                    <span for="address" class="line__placeholder">
                        Dirección
                    </span>
                </div>

                <div class="line md:w-1/2">
                    <input class="line__input" id="country" autocomplete="off" type="text" v-model="form.country" />

                    <span for="country" class="line__placeholder"> País </span>
                </div>
            </div>

            <div class="flex flex-col md:flex-row md:space-x-5 md:space-y-0 space-y-3">
                <div class="line md:w-1/2">
                    <input class="line__input" id="district" autocomplete="off" type="text" v-model="form.district" />
                    <span for="district" class="line__placeholder">
                        Distrito
                    </span>
                </div>

                <div class="line md:w-1/2">
                    <input class="line__input" id="phone" autocomplete="off" type="text" v-model="form.phone" />

                    <span for="phone" class="line__placeholder">
                        Telefono
                    </span>
                </div>
            </div>

            <div class="flex flex-col md:flex-row md:space-x-5 md:space-y-0 space-y-3">
                <div class="line md:w-1/2">
                    <select class="line__input" id="business_type" autocomplete="off" type="text"
                        v-model="form.business_type">
                        <template v-for="(item, index) in business_type" :key="index">
                            <option :value="item">{{ item }}</option>
                        </template>
                    </select>


                    <span for="business_type" class="line__placeholder">
                        TIPO DE NEGOCIO
                    </span>
                </div>

                <div class="line md:w-1/2">
                    <input class="line__input" id="email" autocomplete="off" type="text" v-model="form.email" />

                    <span for="email" class="line__placeholder"> Email </span>
                </div>
            </div>

          
        </FormCard>
    </Layout>
</template>
