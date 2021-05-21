<aside :class="{ '-right-72': !open, 'right-0': open }"
    class="absolute top-0 flex flex-col items-center justify-start w-1/5 min-h-full px-8 overflow-hidden transition-all duration-150 ease-in-out transform bg-gunmetal-700 text-gunmetal-200 xl:w-1/6">

    <!-- USER -->
    @include('Common.user_info')

    <!-- NOTES -->
    @include('Common.user_notes')

    <!-- USER MENU -->
    @include('Common.user_menu')
</aside>

<!-- HIDEBTN --->
<a @click.prevent="open = !open" id="hideuser" href="#" :class="{ 'right-6': !open, 'right-1/5 xl:right-1/6': open }"
    class="absolute flex items-center justify-center transition-all duration-150 ease-in-out top-1/2 xl:top-112 -mr-7">
    <i :class="{ 'fa-chevron-left': !open, 'fa-chevron-right': open }"
        class="px-5 py-4 rounded-full text-md fas bg-gunmetal-700 text-gunmetal-50"></i>
</a>
