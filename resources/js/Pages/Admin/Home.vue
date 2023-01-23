<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import CardDash from "@/Components/generals/CardDash.vue";
import Icons from "@/Components/generals/Icons.vue";
const props = defineProps({
    users: Object,
    status: String,
});

</script>

<template>
    <LayoutAdmin>
       <div class="mx-5 p-5">
        <div class="flex space-x-5">
            <CardDash
                title="usuarios registrado"
                :total="users?.all"
                class="border-blue-300 bg-blue-300 w-1/2"
                ><Icons type="users" className="m-2 text-blue-300"></Icons
            ></CardDash>
            <CardDash
                title="usuarios deshabilitados"
                :total="users.disabled"
                class="border-gray-400 bg-gray-400 w-1/2"
                ><Icons type="users" className="m-2 text-gray-400"></Icons
            ></CardDash>
        </div>
       </div>
    </LayoutAdmin>
</template>
