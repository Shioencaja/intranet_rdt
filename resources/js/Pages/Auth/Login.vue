<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetInputError from "@/Components/InputError.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import HourInterval from "@/Components/HourInterval.vue";
import HeaderPage from "../../Components/generals/HeaderPage.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<!-- <template>
    <Head title="Log in" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <JetInputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Password" />
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <JetInputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <JetCheckbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template> -->
<template>
    <div
        class="bg-blue-400 h-screen bg-[url('/images/login.png')] flex justify-center items-center"
    >
        <HeaderPage></HeaderPage>
        <div
            class="login-d flex flex-col justify-center items-center w-full md:w-1/2 lg:w-1/2 xl:w-1/3 p-5"
        >
            <div class="text-center py-5">
                <img src="/images/usericon.png" width="150" alt="" />
            </div>
            <form action="" class="w-3/4" @submit.prevent="submit">
                <div class="space-y-7">
                    <div class="">
                        <input
                            type="text"
                            placeholder="Usuario"
                            id="email"
                            v-model="form.email"
                            name="email"
                            class="input-login"
                        />
                        <JetInputError
                            class="mt-2"
                            :message="form.errors.email"
                        />
                    </div>
                    <div>
                        <input
                            type="password"
                            placeholder="Contraseña"
                            name="password"
                            id="password"
                            autocomplete="current-password"
                            class="input-login"
                            v-model="form.password"
                        />

                        <JetInputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>
                </div>
                <div class="mx-5 md:mx-14 space-y-4 mt-3">
                    <button type="submit" class="btn-circle-s">
                        INICIAR SESIÓN
                    </button>

                    <button type="button" class="btn-circle">
                        <Link :href="route('register')" class="btn-circle hover:text-white">REGISTRATE</Link>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
