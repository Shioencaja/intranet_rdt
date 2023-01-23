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
    canResetPassword: Boolean,
    marketings: Object,
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
        Inertia.delete(route("admin.marketing_destroy", id), {
            onError: (errors) => {
                console.log(errors)
                Swal.fire({
                    icon: "error",
                    title: JSON.stringify(errors),
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            onSuccess: page => {
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
    Inertia.get(route("admin.product"), { q: q.value }, { preserveState: true });
}, 250);

watch(q, (value, old) => {
    getSearch();
});
</script>

<template>
    <LayoutAdmin>
        
        <TableCustom add="admin.product_add" class="mt-5" titlePage="IMAGEN DE PRODUCTO">
            
            <template #search>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="border-2 h-10 px-5 pr-16 rounded-lg text-sm input-search"
                        type="text"
                        name="search"
                        v-model="q"
                        placeholder="Buscar: titulo"
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
                <TheadTable>Titulo</TheadTable>
             
                <TheadTable>Imagen</TheadTable>
                <TheadTable>Acciones</TheadTable>
            </template>
            <template #tbody>
                <Tbody v-for="(item, index) in marketings.data" :key="index">
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        {{ item.title }}
                    </td>
                    
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <img :src="item.image_url" width="40" alt="" srcset="">
                    </td>
                    <td
                        class="flex  p-3"
                    >
                        <Link :href="route('admin.product_edit', item.id)">
                            <Icons
                                type="edit"
                                className="text-gray-500 w-5 cursor-pointer"
                        /></Link>
                        <div @click="() => confirmDelete(item.id)">
                            <Icons
                                type="delete"
                                className="text-red-500 w-5 cursor-pointer"
                            />
                        </div>
                    </td>
                </Tbody>
            </template>

            <template #pag
                ><PaginateCustom
                    :links="marketings.links"
                    :total="marketings.total"
                ></PaginateCustom
            ></template>
        </TableCustom>
    </LayoutAdmin>
</template>
