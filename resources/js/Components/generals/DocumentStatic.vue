<script setup>
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});


</script>

<template>
    <div class="">
        <div><span class="title-docs-p">DOCUMENTOS</span></div>
        <div class="mx-8 mt-5">
            <div class="flex items-center py-1">
                <img src="/images/word.png" alt="" srcset="" width="35">
                <a href="/images/word.png" download="document" ><span class="title-docs ">DOCUMENTO UNO</span></a>
            </div>
            <div class="flex items-center py-1" >
                <img src="/images/word.png" alt="" srcset="" width="35">
                <a href="/images/word.png" download="document" ><span class="title-docs ">DOCUMENTO DOS</span></a>
            </div>
            <div class="flex items-center py-1">
                <img src="/images/word.png" alt="" srcset="" width="35">
                <a href="/images/word.png" download="document" ><span class="title-docs ">DOCUMENTO TRES</span></a>
            </div>
            <div class="flex items-center py-1">
                <img src="/images/word.png" alt="" srcset="" width="35">
                <a href="/images/word.png" download="document" ><span class="title-docs ">DOCUMENTO CUATRO</span></a>
            </div>
        </div>
    </div>
</template>

<style scoped>
.title-docs-p {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;

    color: #696969;
}

.title-docs {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 22px;
    color: #707070;
}


@media only screen and (max-width: 600px) {
  .title-docs-p{
    font-size: 15px;
  }
  .title-docs{
    font-size: 13px;
  }
}
</style>