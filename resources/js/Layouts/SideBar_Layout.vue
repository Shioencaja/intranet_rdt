<script setup>
import ItemUnit from "./components/ItemUnit.vue";
import Icons from "@/Components/generals/Icons.vue";
import SearchCustom from "@/Components/generals/SearchCustom.vue";
import ItemDrop from "./components/ItemDrop.vue";
import LineItem from "./components/LineItem.vue";
import ItemMenu from "./components/ItemMenu.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ItemSub from "./components/ItemSub.vue";
const props = defineProps({
  canResetPassword: Boolean,
  status: String,
});
</script>

<template>
  <div class="sidebar scroll-v">
    <div class="sidebar_header">
      <img src="/images/logo.png" alt="" />
      <img src="/images/logo-icon.png" class="logo-icon" alt="" />

      <span
        class="btn-mobile"
        uk-toggle="target: #wrapper ; cls: is-collapse is-active"
      ></span>
    </div>

    <div class="sidebar_inner overflow-auto">
      <ul>
        <!-- <li>
          <SearchCustom></SearchCustom>
        </li> -->

        <ItemUnit
          title="INICIO"
          routeName="dashboard"
          :active="$page.url == '/dashboard' ? true : false"
        >
          <Icons type="home" />
        </ItemUnit>

        <ItemDrop
          title="TUTORIALES"
          :active="$page.url.startsWith('/dashboard/tutorials') ? true : false"
        >
          <template #icon>
            <Icons type="page" />
          </template>

          <template v-for="(item, index) in $page.props?.lines" :key="index">
            <ItemMenu
              :title="item.line"
              routeName="tutorial"
              :params="[item.line, item.id]"
            ></ItemMenu>
            <LineItem />
          </template>
        </ItemDrop>

        

      
        <ItemDrop title="HERRAMIENTAS DE MARKETING" :active="$page.url.startsWith('/dashboard/marketings') ? true : false" >
                    <template #icon><Icons type="job" /></template>
                    <ItemSub :active="$page.url.startsWith('/dashboard/marketings/digital') ? true : false" title="H. DIGITALES">
                        <ItemMenu title="CUPONES" routeName="marketing.digital"  params="cupones"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="IMÁGENES DE REDES SOCIALES" routeName="marketing.digital"  params="imagenes"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEOS DE REDES SOCIALES" routeName="marketing.digital"  params="videos" ></ItemMenu>
                        <LineItem />
                        <ItemMenu title="TARJETAS DE FIDELIZACIÓN" routeName="marketing.digital"  params="fidelizacion"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="PÓSTER" routeName="marketing.digital" params="poster"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="MENÚ DE SERVICIO" routeName="marketing.digital"  params="services"></ItemMenu>
                    </ItemSub>
                    <ItemSub :active="$page.url.startsWith('/dashboard/marketings/advertising') ? true : false" title="H. PUBLICITARIAS">
                        <ItemMenu title="LOGOS DE MARCA" routeName="marketing.advertising"  params="logos"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="OTROS LOGOS" routeName="marketing.advertising"  params="other-logos"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="MODELOS" routeName="marketing.advertising"  params="models"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="IMAGEN DE PRODUCTO" routeName="marketing.advertising"  params="products"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEO DE PRODUCTO" routeName="marketing.advertising"  params="product-videos"></ItemMenu>
                        <LineItem />
                        <ItemMenu title="VIDEOS PUBLICITARIOS" routeName="marketing.advertising"  params="video-public"></ItemMenu>
                    </ItemSub>
                </ItemDrop>
      

        <ItemUnit
          title="EVENTOS"
          routeName="event"
          :active="$page.url.startsWith('/dashboard/events') ? true : false"
        >
          <Icons type="event" />
        </ItemUnit>
        <ItemUnit
          title="LOOKS & TRENDS"
          routeName="look"
          :active="$page.url.startsWith('/dashboard/looks') ? true : false"
        >
          <Icons type="page" />
        </ItemUnit>
      </ul>
    </div>
  </div>
</template>

<style>

.sidebar .sidebar_inner ul li.active-submenu ul{
  padding: 0 !important;
}

</style>