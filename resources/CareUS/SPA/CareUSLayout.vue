<template>
    <section id="container" class="flex flex-col w-full min-h-screen">

        <TopMenu></TopMenu>

        <main class="flex flex-wrap flex-1">
            <SideMenu></SideMenu>

            <section class="flex-grow w-full min-h-full p-0 xl:p-4 xl:w-11/12">
                <slot></slot>
            </section>

        </main>

        <BottomMenu></BottomMenu>

    </section>
</template>

<script>
import TopMenu from '../Components/TopMenu';
import BottomMenu from '../Components/BottomMenu';
import SideMenu from '../Components/SideMenu.vue';

export default {
    name: "CareUSLayout",
    components: { TopMenu, BottomMenu, SideMenu }
}
</script>

<style>

</style>
