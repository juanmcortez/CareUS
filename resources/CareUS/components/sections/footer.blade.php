<footer class="flex justify-center w-full px-10 py-6 bg-gunmetal-500">
    <div class="container flex flex-col items-center mx-auto lg:flex-row">
        <a href="{{ route('dashboard.index') }}"
            class="flex items-center justify-center font-medium text-lightcyan-500 title-font md:justify-start">
            <i class="p-2 mx-auto text-xl rounded-full fas fa-heartbeat bg-bdazzledblue-500"></i>
            <span class="ml-3 text-base">{{ config('app.name') }}</span>
        </a>

        <p
            class="my-4 text-xs lg:my-0 text-lightcyan-700 lg:ml-4 lg:pl-4 lg:border-l-2 lg:border-lightcyan-700 lg:py-2">
            &copy; {{ __('Copyright') }} <span class="font-bold">Juan M. Cortéz</span>
            —
            <span class="font-bold">2020/{{ date('y') }}</span>.
        </p>

        <span class="inline-flex justify-center lg:ml-auto lg:mt-0 lg:justify-start text-lightcyan-700 ">
            <a href="" target="_blank" class="cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-facebook-square"></i>
            </a>
            <a href="" target="_blank" class="ml-3 cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-twitter-square"></i>
            </a>
            <a href="" target="_blank" class="ml-3 cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-instagram-square"></i>
            </a>
            <a href="" target="_blank" class="ml-3 cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-youtube-square"></i>
            </a>
            <a href="" target="_blank" class="ml-3 cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/juanmcortez/CareUS" target="_blank"
                class="ml-3 cursor-pointer hover:text-bdazzledblue-500">
                <i class="text-base fab fa-github-square"></i>
            </a>
        </span>
    </div>
</footer>
