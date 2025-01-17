<!-- header -->
<header class="flex items-center gap-2 px-4 pt-4 lg:gap-4 gap-y-12 lg:gap-x-12 lg:px-10 lg:pt-10">
    <label for="my-drawer" class="btn btn-square btn-ghost drawer-button lg:hidden">
        <x-heroicon-o-bars-3 class="w-5 h-5" />
    </label>
    <div class="grow">
        <h1 class="lg:text-2xl lg:font-light">{{ isset($title) ? $title : '' }}</h1>
    </div>
    <!-- dropdown -->
    <div class="z-10 dropdown-end dropdown">
        <div tabindex="0" class="avatar placeholder btn btn-circle btn-ghost">
            <div class="w-10 rounded-full bg-neutral text-neutral-content">
                <span>{{ strtoupper(auth()->user()->name[0]) }}</span>
            </div>
        </div>
        <ul tabindex="0" class="p-2 mt-3 shadow-2xl menu dropdown-content w-52 rounded-box bg-base-100">
            {{-- <li>@livewire('user.logout')</li> --}}
        </ul>
    </div>
    <!-- /dropdown -->
</header>
<!-- /header -->
