<script setup>
import Icons from '@/Components/generals/Icons.vue';
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});


</script>

<template>
    
    <div class="flex flex-col md:flex-row mt-5 justify-between  space-y-6 md:space-y-0 md:space-x-6 w-full">
        <div class="">
            <img src="/images/dev/digital.png" alt="" srcset="" class="w-full" />
            <div class="mar_card">
                <div class="p-5">
                    <p class="mar_card_title">HERRAMIENTAS DIGITALES</p>
                    <Link :href="route('marketing.digital')">
                    <div class="flex items-center mt-3">
                        <p class="mar_card_sub mr-3">
                            MATERIAL SELECTION
                        </p>
                        <Icons type="down"></Icons>
                    </div>
                    </link>
                </div>
            </div>
        </div>
        <div class="">
            <img src="/images/publicitary.png" alt="" srcset="" class="w-full" />
            <div class="mar_card">
                <div class="p-5">
                    <p class="mar_card_title">
                        HERRAMIENTAS PUBLICITARIAS
                    </p>
                    <Link :href="route('marketing.advertising')">
                    <div class="flex items-center mt-3">
                        <p class="mar_card_sub mr-3">
                            MATERIAL SELECTION
                        </p>
                        <Icons type="down"></Icons>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>