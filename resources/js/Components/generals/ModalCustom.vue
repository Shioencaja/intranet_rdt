<script setup>
import { ref, onMounted, onUpdated } from "vue";
const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    status: String,
});
const modal_overlay = ref("");
const modal = ref("");

onMounted(() => {
    openModal(props.show);
});
onUpdated(() => {
    openModal(props.show);
});

const emit = defineEmits(["close"]);

const close = () => {
    emit("close");
};

function openModal(value) {
    if (value) {
        modal_overlay.value.classList.remove("hidden");
        setTimeout(() => {
            modal.value.classList.remove("opacity-0");
            modal.value.classList.remove("-translate-y-full");
            modal.value.classList.remove("scale-150");
        }, 100);
    } else {
        modal.value.classList.add("-translate-y-full");
        setTimeout(() => {
            modal.value.classList.add("opacity-0");
            modal.value.classList.add("scale-150");
        }, 100);
        setTimeout(() => modal_overlay.value.classList.add("hidden"), 300);
    }
}
</script>

<template>
    <!-- overlay -->
    <div
        ref="modal_overlay"
        class="hidden fixed  inset-0 bg-black bg-opacity-60 w-full flex  items-center justify-center md:items-center modal-cs"
    >
        <!-- modal -->
        <div
            ref="modal"
            class="opacity-0 transform -translate-y-full scale-150 relative w-10/12 md:w-1/2 h-3/4 md:h-1/2 flex items-center bg-white rounded shadow-lg transition-opacity transition-transform duration-300"
        >
            <!-- button close -->
            <button
                @click="close"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white"
            >
                &cross;
            </button>

            <!-- header -->
            <!-- <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-600">Title</h2>
            </div> -->

            <!-- body -->
            <div class="w-full p-3 flex items-center justify-center h-auto">
                <slot></slot>
            </div>

            
        </div>
    </div>
</template>
<style>
/* .modal-cs{
    height: 100% !important;
} */
</style>