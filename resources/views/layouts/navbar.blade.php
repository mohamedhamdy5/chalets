<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
                <li class="pl-2 leading-normal text-sm">
                    <a class="opacity-50 text-slate-700" href="javascript:;">الرئيسية</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-right before:pl-2 before:text-gray-600 before:content-['/']" aria-current="page">@yield('page_title')</li>
            </ol>
            {{-- <h6 class="mb-0 font-bold capitalize">@yield('page_title')</h6> --}}
        </nav>
    </div>
</nav>
