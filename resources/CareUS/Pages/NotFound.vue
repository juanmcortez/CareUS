<template>
    <div id="content" class="flex flex-row items-center flex-1 min-h-full bg-lightcyan-500">
        <div class="flex-grow text-center text-gunmetal-900">
            <h1 class="mb-2 text-6xl font-bold text-gray-900 title-font xl:text-9xl">404</h1>
            <p class="leading-relaxed text-md xl:text-xl">Looks like you got lost!</p>
        </div>
    </div>
</template>

<script>
import CareUSLayout from '../SPA/CareUSLayout';
export default {
    name: 'NotFound',
    created() {
        this.$emit('update:mainlayout', CareUSLayout);
    }
}
</script>

<style>

</style>
