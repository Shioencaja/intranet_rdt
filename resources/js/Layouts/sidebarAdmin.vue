<script setup>
import Icons from "@/Components/generals/Icons.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ItemUnit from "./components/ItemUnit.vue";
import ItemSub from "./components/ItemSub.vue";

import ItemMenu from "./components/ItemMenu.vue";
import LineItem from "./components/LineItem.vue";
import ItemDrop from "./components/ItemDrop.vue";
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});

const activeAdmin = [
    "admin.event",
    "admin.event_edit",
    "user.event_add",

    "admin.look",
    "admin.look_edit",
    "user.look_add",
];
</script>

<template>
    <div class="sidebar">
        <div class="sidebar_header">
            <img src="/images/logo.png" alt="" />
            <img src="/images/logo-icon.png" class="logo-icon" alt="" />

            <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></span>
        </div>

        <div class="sidebar_inner overflow-auto">
            <!--data-simplebar -->
            <ul>
                <ItemUnit title="HOME" routeName="admin" :active="
                    $page.url == '/admin' ? true : false
                ">
                    <Icons type="home" />
                </ItemUnit>
                <ItemUnit title="MASTER CLASS" routeName="admin.course" :active="
                    $page.url.startsWith('/admin/courses') ? true : false
                ">
                    <Icons type="course" />
                </ItemUnit>

                <ItemDrop title="HERRAMIENTAS DE MARKETING"
                    :active="$page.url.startsWith('/admin/marketings') ? true : false">
                    <template #icon>
                        <Icons type="job" />
                    </template>
                    <ItemSub :active="$page.url.startsWith('/admin/marketings/hd') ? true : false" title="H. DIGITALES">
                        <ItemMenu title="CUPONES" routeName="admin.coupons"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="IMÁGENES DE REDES SOCIALES" routeName="admin.red"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEOS DE REDES SOCIALES" routeName="admin.red_video"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="TARJETAS DE FIDELIZACIÓN" routeName="admin.card"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="PÓSTER" routeName="admin.poster"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="MENÚ DE SERVICIO" routeName="admin.service"></ItemMenu>
                    </ItemSub>
                    <ItemSub :active="$page.url.startsWith('/admin/marketings/hp') ? true : false"
                        title="H. PUBLICITARIAS">
                        <ItemMenu title="LOGOS DE MARCA" routeName="admin.logo"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="OTROS LOGOS" routeName="admin.other_logo"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="MODELOS" routeName="admin.model"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="IMAGEN DE PRODUCTO" routeName="admin.product"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEO DE PRODUCTO" routeName="admin.product_v"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEOS PUBLICITARIOS" routeName="admin.advertising"></ItemMenu>
                    </ItemSub>
                </ItemDrop>

                <ItemUnit title="EVENTOS" routeName="admin.event" :active="
                    $page.url.startsWith('/admin/events') ? true : false
                ">
                    <Icons type="event" />
                </ItemUnit>

                <ItemUnit title="LOOKS & TRENDS" routeName="admin.look" :active="
                    $page.url.startsWith('/admin/looks') ? true : false
                ">
                    <Icons type="page" />
                </ItemUnit>
                <ItemUnit title="TUTORIALES" routeName="admin.tutorial" :active="
                    $page.url.startsWith('/admin/tutorials') ? true : false
                ">
                    <Icons type="page" />
                </ItemUnit>


                <ItemUnit title="USUARIOS" routeName="admin.user" :active="
                    $page.url.startsWith('/admin/users') ? true : false
                ">
                    <Icons type="users" />
                </ItemUnit>




            </ul>

            <hr />
        </div>
    </div>
</template>
