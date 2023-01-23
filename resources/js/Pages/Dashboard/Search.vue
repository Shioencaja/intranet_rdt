<script setup>
import Layout from "@/Layouts/Layout.vue";
import Menu_Right from "@/Components/pages/menus/Menu_Right.vue";
import ItemCourse from "@/Components/cards/ItemCourse.vue";
import LineTitle from '@/Components/generals/LineTitle.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Icons from '@/Components/generals/Icons.vue';

const props = defineProps({
    data: Object,
    total: Number,
    q:String
});
</script>

<template>

    <Layout>
       
        <LineTitle title="BÚSQUEDA" />
        
        <div v-if="total > 0">
            <div v-for="(item, index) in data" :key="index" class="p-2" >
                <div v-if="item.data.length > 0">
                    <div>
                        <h3 class="text-md font-bold leading-none text-gray-500 py-3 ">{{ item.modulo }}</h3>
                    </div>
                    <ul v-for="(d, index) in item.data" :key="index" class="divide-y divide-gray-200 dark:divide-gray-700 mx-5">
                        <Link :href="route(`${item.route}`, [d.title, d.id])" v-if="item.params">
                            <li class="py-1  hover:bg-gray-200 px-2">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500 truncate ">
                                        {{d.title}}
                                    </p>
            
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-500 ">
                                   <Icons type="arrow-right"/>
                                </div>
                            </div>
                        </li>
                        </Link>
                        <Link :href="route(`${item.route}`, [d.id])" v-else>
                        <li class="py-1 px-2 hover:bg-gray-200">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500 truncate ">
                                        {{d.title}}
                                    </p>
            
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-500 ">
                                    <Icons type="arrow-right"/>
                                </div>
                            </div>
                        </li>
                        </Link>
                    </ul>
                </div>
            </div>
        </div>

        <div v-else class="p-5">
            <p class="text-center lowercase">NO SE ENCONTRARON coincidencia CON LA PALABRA <strong>{{q}}</strong></p>
        </div>


    </Layout>
</template>
