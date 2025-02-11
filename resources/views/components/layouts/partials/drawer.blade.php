<aside class="z-10 drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <!-- sidebar menu -->
    <nav class="flex flex-col min-h-screen gap-2 px-6 py-10 overflow-y-auto w-72 bg-base-100">
        <ul class="menu">
            <li>
                <a class="{{ Request::routeIs('dashboard.*') ? 'active' : '' }}" 
                    href="{{ route('dashboard.index') }}">
                    <x-phosphor-house class="w-5 h-5" />
                    Dashboard
                </a>
            </li>
            <li>
                <details open="">
                    <summary>
                        <x-phosphor-archive class="w-5 h-5" />
                        Master Data
                    </summary>
                    <ul>
                        <li>
                            <a class="{{ Request::routeIs('master-data.employee.*') ? 'active' : '' }}"
                                href="{{ route('master-data.employee.index') }}">
                                Karyawan
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::routeIs('master-data.unit.*') ? 'active' : '' }}"
                                href="{{ route('master-data.unit.index') }}">
                                Unit
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::routeIs('master-data.position.*') ? 'active' : '' }}"
                                href="{{ route('master-data.position.index') }}">
                                Jabatan
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </nav>
    <!-- /sidebar menu -->
</aside>
