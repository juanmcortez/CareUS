<template>
    <div id="content" class="flex-1 min-h-full bg-lightcyan-500">
        <div id="submenu" class="p-2 xl:p-4 text-lightcyan-500 bg-bdazzledblue-500">
            <h2 class="">Dashboard</h2>
        </div>
        <div class="flex-grow p-2 xl:p-4 text-gunmetal-900">CONTENT</div>
    </div>
</template>

<script>
import CareUSLayout from '../SPA/CareUSLayout';
export default {
    name: 'Dashboard',
    created() {
        this.$emit('update:mainlayout', CareUSLayout);
    }
}
</script>

<style>

</style>
