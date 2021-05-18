<template>
    <aside class="w-full p-2 text-center xl:p-4 xl:w-1/12 bg-burntsienna-500">
        <nav class="flex flex-row min-h-full align-top xl:text-xs justify-evenly xl:flex-col">
            <router-link active-class="text-burntsienna-800" :to="{ name: 'dashboard' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-tachometer-alt"></i>
                Dashboard
            </router-link>
            <router-link :to="{ name: 'patients.list' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-hospital-user"></i>
                Patients
            </router-link>
            <router-link :to="{ name: 'patients.list' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-file-invoice-dollar"></i>
                Billing
            </router-link>
            <router-link :to="{ name: 'patients.list' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-money-check"></i>
                Payments
            </router-link>
            <router-link :to="{ name: 'patients.list' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-calendar-alt"></i>
                Calendar
            </router-link>
            <router-link :to="{ name: 'patients.list' }" class="flex flex-col">
                <i class="pb-1 text-xl xl:pb-2 xl:text-3xl fas fa-chart-pie"></i>
                Reports
            </router-link>
            <span class="hidden xl:block">&nbsp;</span>
            <span class="hidden xl:block">&nbsp;</span>
            <span class="hidden xl:block">&nbsp;</span>
            <span class="hidden xl:block">&nbsp;</span>
            <span class="hidden xl:block">&nbsp;</span>
            <span class="hidden xl:block">&nbsp;</span>
        </nav>
    </aside>
</template>

<script>
export default {
    name: 'SideMenu',
}
</script>

<style>

</style>
