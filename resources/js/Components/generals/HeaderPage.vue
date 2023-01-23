
<script setup>
import HourInterval from '@/Components/HourInterval.vue';
import moment from 'moment'


const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});
</script>

<template>
    <div class="absolute top-0 bg-white w-full">
        <div class="container mx-auto">
            <div class="flex justify-center md:justify-between items-center h-20">
                <div><img src="/images/logo.png" alt="" srcset="" /></div>
                <div class="flex  flex-col justify-center items-center md:flex-row">
                   <div>
                    <span class="mx-3 md:mx-6 s-date">{{dateCustom()}}</span>
                   </div>
                    <HourInterval></HourInterval>
                </div>
            </div>
        </div>
    </div>
</template>
