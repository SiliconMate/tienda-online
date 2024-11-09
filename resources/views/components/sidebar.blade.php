<!-- Barra lateral izquierda -->
<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white left-sidebar   transition-all duration-300">

    <!-- Logo de la barra lateral -->
    <div class="p-5 flex items-center justify-start">
        <a href="{{ route('dashboard') }}" class="text-nowrap flex items-center gap-2">
            <img src="{{ asset('assets/images/logos/logo-UTN.png') }}" alt="Logo" class="w-auto h-11 object-cover" />
        </a>
    </div>

    <!-- Menú de la barra lateral -->
    <div class="scroll-sidebar" data-simplebar="">
        <div class="px-6">
            <!-- Menú de la barra lateral -->
            <nav class=" w-full flex flex-col sidebar-nav">
                <!-- Lista de opciones del menú con todas las opcione -->
                <ul id="sidebarnav" class="text-gray-600 text-sm">
                    
                    <x-sidebar-section-title> HOME </x-sidebar-section-title>

                    <x-sidebar-section-link href="{{ route('dashboard') }}">
                        <i class="ti ti-layout-dashboard  text-xl"></i> Dashboard
                    </x-sidebar-section-link>

                    <x-sidebar-section-title> PRODUCTOS/CATEGORIAS </x-sidebar-section-title>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-article text-xl"></i> Categorias
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-shopping-cart text-xl"></i> Productos
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-message text-xl"></i> Opiniones
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-scan text-xl"></i> Descuentos
                    </x-sidebar-section-link>

                    <x-sidebar-section-title> VENTAS </x-sidebar-section-title>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-receipt text-xl"></i> Ordenes
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="#">
                        <i class="ti ti-shopping-cart text-xl"></i> Ventas
                    </x-sidebar-section-link>

                    <x-sidebar-section-title> USUARIOS </x-sidebar-section-title>

                    <x-sidebar-section-link href="{{ route('users.index') }}">
                        <i class="ti ti-user text-xl"></i> Usuarios
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="{{ route('permissions.index') }}">
                        <i class="ti ti-license text-xl"></i> Permisos
                    </x-sidebar-section-link>

                    <x-sidebar-section-link href="{{ route('roles.index') }}">
                        <i class="ti ti-lock text-xl"></i> Roles
                    </x-sidebar-section-link>
                </ul>
            </nav>
        </div>
    </div>

</aside>
