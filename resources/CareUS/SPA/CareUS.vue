<template>
    <component :is="mainlayout">
        <router-view :mainlayout.sync="mainlayout" />
    </component>
</template>

<script>
export default {
    name: "CareUS",
    data() {
        return {
            mainlayout: 'div',
        }
    }
}
</script>

<style>

</style>
