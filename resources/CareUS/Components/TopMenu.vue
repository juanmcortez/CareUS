<template>
    <header class="flex flex-row flex-wrap text-center">
        <aside class="w-1/3 px-4 pt-1 text-sm font-bold xl:text-2xl xl:w-1/12 bg-bdazzledblue-800 xl:bg-burntsienna-500">
            <i class="inline-block fas fa-notes-medical"></i>
            CareUS
        </aside>
        <section class="w-2/3 p-0 xl:flex-grow bg-bdazzledblue-800">
            <input name="full_search" type="text" placeholder="Search"
                class="w-full py-2 bg-transparent border-none outline-none text-xxs md:text-xs xl:text-sm text-lightcyan-800 focus:bg-bdazzledblue-900 focus:text-lightcyan-300" />
        </section>
        <aside class="w-full px-2 py-1 xl:px-4 xl:py-2 xl:w-3/12 bg-bdazzledblue-800">
            <nav class="flex flex-row xl:text-xs justify-evenly">
                <span>v1.0.0</span>
                <a href="#">Your Practice Name</a>
                <a href="#">Logout</a>
            </nav>
        </aside>
    </header>
</template>

<script>
export default {
    name: 'TopMenu',
}
</script>

<style>

</style>
