<script setup>
import SideBar_Layout from "./SideBar_Layout.vue";
import Header_Layout from "./Header_Layout.vue";
import { onMounted } from "vue";
import SidebarAdmin from "./sidebarAdmin.vue";

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
onMounted(() => {
    const uikit = document.createElement("script");
    uikit.setAttribute("src", "/template/assets/js/uikit.js");
    document.head.appendChild(uikit);
});
</script>

<template>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon -->
        <link
            href="/template/assets/images/favicon.png"
            rel="icon"
            type="image/png"
        />

        <!-- Basic Page Needs
        ================================================== -->
        <title>Socialite Template</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta
            name="description"
            content="Socialite is - Professional A unique and beautiful collection of UI elements"
        />

        <!-- icons
    ================================================== -->
        <link rel="stylesheet" href="/template/assets/css/icons.css" />

        <!-- CSS 
    ================================================== -->
        <link rel="stylesheet" href="/template/assets/css/uikit.css" />
        <!-- <link rel="stylesheet" href="/template/assets/css/style.css" /> -->
        <!-- <link rel="stylesheet" href="/template/assets/css/tailwind.css" /> -->
    </head>
    <div id="wrapper">
        <!-- Header -->
        <Header_Layout />
        <!-- sidebar -->
        <SidebarAdmin></SidebarAdmin>
      
        <!-- Main Contents -->
        
        <div class="main_content">
            <!-- <div class="mcontainer"> -->
            <!--  breadcrumb -->
            
            <!-- content -->
            <slot></slot>
            <!-- </div> -->
        </div>
    </div>
</template>
