<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetActionMessage from "@/Components/ActionMessage.vue";
import JetButton from "@/Components/Button.vue";
import JetFormSection from "@/Components/FormSection.vue";
import JetInput from "@/Components/Input.vue";
import JetInputError from "@/Components/InputError.vue";
import JetLabel from "@/Components/Label.vue";
import FormCard from "@/Components/forms/FormCard.vue";
import Layout from "@/Layouts/Layout.vue";
import ErrorsValidate from "@/Components/ErrorsValidate.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
  current_password: "",
  password: "",
  password_confirmation: "",
});

const updatePassword = () => {
  form.put(route("user-password.update"), {
    errorBag: "updatePassword",
    preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: () => {
      if (form.errors.password) {
        form.reset("password", "password_confirmation");
        passwordInput.value.focus();
      }

      if (form.errors.current_password) {
        form.reset("current_password");
        currentPasswordInput.value.focus();
      }
    },
  });
};
</script>

<template>
  <Layout>

    <FormCard
      title="ACTUALIZAR CONTRASEÑA"
      :submit="updatePassword"
      back="dashboard"
      class="w-full"
    >
      <div>
        <span class="text-red-500">{{ form.errors.password }}</span>
      </div>
      <div v-if="form.recentlySuccessful">
        <span class="text-green-500">contraseña cambiada correctamente</span>
      </div>
      <div class="line w-full">
        <input
          class="line__input"
          autocomplete="off"
          type="text"
          v-model="form.current_password"
          required
        />
        <span class="line__placeholder"> Contraseña antigua(*) </span>
      </div>

      <div class="line w-full">
        <input
          class="line__input"
          autocomplete="off"
          type="text"
          v-model="form.password"
          ref="passwordInput"
          required
        />
        <span for="" class="line__placeholder"> Contraseña nueva (*) </span>
      </div>
      <div class="line w-full">
        <input
          class="line__input"
          autocomplete="off"
          type="text"
          v-model="form.password_confirmation"
          required
        />
        <span for="" class="line__placeholder"> Confirmar contraseña(*) </span>
      </div>
    </FormCard>
  </Layout>
</template>
