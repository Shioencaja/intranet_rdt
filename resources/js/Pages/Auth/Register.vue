<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetInputError from "@/Components/InputError.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import HeaderPage from "@/Components/generals/HeaderPage.vue";
import LineTitle from "@/Components/generals/LineTitle.vue";
import FormInput from "../../Components/forms/FormInput.vue";
import FormLabel from "../../Components/forms/FormLabel.vue";

defineProps({
  business_type: Object,
});

const form = useForm({
  name: "",
  email: "",
  role: 1,
  password: "",
  password_confirmation: "",
  terms: false,

  date_birth: "",
  surnames: "",
  gender: "",
  address: "",
  country: "",
  district: "",
  phone: "",
  business_type: "",
});

const submit = () => {
  form.password_confirmation = form.password;
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />
  <div class="bg-white md:h-screen flex justify-center items-center">
    <HeaderPage />

    <div
      class="
        flex flex-col
        mt-20
        md:mt-0
        justify-center
        items-center
        md:w-1/2
        p-5
      "
    >
      <LineTitle title="REGISTRO INTRANET RADIANT" class="mt-16" />

      <form
        action=""
        method="post"
        class="w-full mt-5"
        @submit.prevent="submit"
      >
        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="name" value="NOMBRES" />
            <FormInput
              id="name"
              v-model="form.name"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.name" />
          </div>
          <div class="md:w-1/3">
            <FormLabel for="birthday" value="FECHA DE NACIMIENTO" />
            <FormInput
              id="birthday"
              v-model="form.date_birth"
              type="date"
              class="mt-1 block w-full text-center h-12"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.date_birth" />
          </div>
        </div>

        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="surnames" value="APELLIDOS" />
            <FormInput
              id="surnames"
              v-model="form.surnames"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.surnames" />
          </div>
          <div class="md:w-1/3">
            <FormLabel for="gender" value="SEXO" />
            <select
              class="w-full text-center b-30 select-custom-b"
              v-model="form.gender"
            >
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
            </select>
          </div>
        </div>

        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="address" value="DIRECCIÒN" />
            <FormInput
              id="address"
              v-model="form.address"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.address" />
          </div>
          <div class="md:w-1/3">
            <FormLabel for="country" value="PAÌS" />
            <FormInput
              id="country"
              v-model="form.country"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.country" />
          </div>
        </div>

        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="district" value="DISTRITO" />
            <FormInput
              id="district"
              v-model="form.district"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.district" />
          </div>
          <div class="md:w-1/3">
            <FormLabel for="phone" value="TELEFÒNO" />
            <FormInput
              id="phone"
              v-model="form.phone"
              type="text"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.phone" />
          </div>
        </div>

        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="email" value="E-MAIL" />
            <FormInput
              id="email"
              v-model="form.email"
              type="email"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.email" />
          </div>
          <div class="md:w-1/3">
            <FormLabel for="business_type" value="TIPO DE NEGOCIO" />

            <select
              class="w-full text-center b-30 select-custom-b"
              v-model="form.business_type"
            >
              <option value=""></option>
              <template v-for="(item, index) in business_type" :key="index">
                <option :value="item">{{ item }}</option>
              </template>
            </select>
            <JetInputError class="mt-2" :message="form.errors.business_type" />
          </div>
        </div>

        <div
          class="
            flex flex-col
            md:flex-row md:space-x-5
            py-3
            space-y-5
            md:space-y-0
          "
        >
          <div class="md:w-2/3">
            <FormLabel for="password" value="CONTRASEÑA" />
            <FormInput
              id="password"
              v-model="form.password"
              type="password"
              class="mt-1 block w-full"
              required
            />
            <JetInputError class="mt-2" :message="form.errors.password" />
          </div>
        </div>
        <div class="flex justify-center mt-5">
          <button
            class="btn-circle-s md:w-1/4"
            type="submit"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            GUARDAR
          </button>
        </div>
        <div class="flex justify-center mt-5">
          <button type="button" class="btn-circle md:w-1/4">
            <Link :href="route('login')" class="btn-circle hover:text-white"
              >LOGIN</Link
            >
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
