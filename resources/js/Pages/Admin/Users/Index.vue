<script setup>
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TableCustom from "@/components/tables/TableCustom.vue";
import TheadTable from "@/components/tables/TheadTable.vue";
import Tbody from "@/components/tables/Tbody.vue";
import Icons from "@/Components/generals/Icons.vue";
import { throttle, pickBy } from "lodash";
import { watch, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import PaginateCustom from "@/shared/PaginateCustom.vue";
import Swal from "sweetalert2";

const props = defineProps({
    users: Object,
    filter: Object,
});

const q = ref(props.filter.q);

const confirmDelete = async (id) => {
    const result = await Swal.fire({
        title: "Estas seguro",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "CANCELAR",
        confirmButtonText: "ELIMINAR",
    });
    if (result.isConfirmed) {
        Inertia.delete(route("admin.user_destroy", id), {
            onError: (errors) => {
                console.log(errors);
                Swal.fire({
                    icon: "error",
                    title: JSON.stringify(errors),
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            onSuccess: (page) => {
                Swal.fire({
                    icon: "success",
                    title: "Eliminado correctamente",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            onFinish: (visit) => {},
        });
    }
};



const getSearch = throttle(() => {
    Inertia.get(
        route("admin.user"),
        { q: q.value },
        { preserveState: true }
    );
}, 250);

watch(q, (value, old) => {
    getSearch();
});
</script>

<template>
    <LayoutAdmin>
        <TableCustom add="admin.user" class="mt-5">
            <template #search>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="border-2 h-10 px-5 pr-16 rounded-lg text-sm input-search"
                        type="text"
                        name="search"
                        v-model="q"
                        placeholder="Buscar: nombre"
                    />
                    <button
                        type="submit"
                        class="absolute right-0 top-0 mt-5 mr-4"
                    >
                        <Icons type="search" />
                    </button>
                </div>
            </template>

            <template #thead>
                <TheadTable>Nombres</TheadTable>
                <TheadTable>Apellidos</TheadTable>
                <TheadTable>Rol</TheadTable>
                <TheadTable>Estado</TheadTable>
                <TheadTable>Acciones</TheadTable>
            </template>
            <template #tbody>
                <Tbody v-for="(item, index) in users.data" :key="index">
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ item.name }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ item.person?.surnames }}
                    </td>
                    <td
                        class="border-grey-light border hover:bg-gray-100 p-3 "
                    >
                        <div
                            class="  rounded-full text-xs text-gray-400 px-2 font-bold"
                            v-if="item.role == 1"
                        >
                            web
                        </div>
                        <div
                            class="  rounded-full text-xs  text-gray-400 font-bold px-2"
                            v-else
                        >
                            admin
                        </div>
                    </td>

                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <div
                            class="text-center bg-green-600 rounded-full text-xs text-white px-2 cursor-pointer"
                            v-if="item.enabled == 1"
                        >
                            activo
                        </div>
                        <div
                            class="text-center bg-gray-400 rounded-full text-xs text-white px-2 cursor-pointer"
                            v-else
                        >
                            inactivo
                        </div>
                    </td>

                    <td class="">
                        <div class="flex p-3 items-stretch">
                            <div>
                                <Link
                                    :href="
                                        route('admin.user_edit', item.id)
                                    "
                                >
                                    <Icons
                                        type="edit"
                                        className="text-gray-500 w-5 cursor-pointer"
                                /></Link>
                            </div>
                            <div @click="() => confirmDelete(item.id)">
                                <Icons
                                    type="delete"
                                    className="text-red-500 w-5 cursor-pointer"
                                />
                            </div>
                        </div>
                    </td>
                </Tbody>
            </template>

            <template #pag
                ><PaginateCustom
                    :links="users.links"
                    :total="users.total"
                ></PaginateCustom
            ></template>
        </TableCustom>
    </LayoutAdmin>
</template>
<style>
/* CHECKBOX TOGGLE SWITCH */
/* @apply rules for documentation, these do not work as inline style */
.toggle-checkbox:checked {
    @apply: right-0 border-green-400;
    right: 0;
    border-color: #68d391;
}
.toggle-checkbox:checked + .toggle-label {
    @apply: bg-green-400;
    background-color: #68d391;
}
</style>
