<header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
    <nav class=" w-full dark:bg-gray-800  flex items-center justify-between" aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                    data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                    aria-label="Toggle navigation" href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>

            <li class="relative">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                    <a class="relative hs-dropdown-toggle inline-flex  icon-hover text-gray-600" href="#">
                        <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                        <div
                            class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                        </div>
                    </a>
                    <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden z-[12]"
                        aria-labelledby="hs-dropdown-custom-icon-trigger">
                        
                        <div>
                            <h3 class="text-gray-600 font-semibold text-base px-6 py-3">
                                Notification
                            </h3>
                            <ul class="list-none  flex flex-col">
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">
                                            New Payment received
                                        </p>
                                        <p class="text-xs text-gray-500 font-medium">
                                            Check your earnings
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">Jolly completed
                                            tasks</p>
                                        <p class="text-xs text-gray-500 font-medium">Assign her new
                                            tasks</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">Roman Joined the
                                            Team!</p>
                                        <p class="text-xs text-gray-500 font-medium">Congratulate him
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </li>

        </ul>
        <div class="flex items-center gap-4">

            <button id="theme-toggle" type="button" class="w-auto text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <img class="object-cover w-9 h-9 rounded-full" src="{{ asset('storage/avatars/'.Auth::user()->avatar) }}"
                        alt="" aria-hidden="true">
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-[7px] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <a href="{{ route('profile.edit') }}" class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                            <i class="ti ti-user text-gray-500 text-xl "></i>
                            <p class="text-sm text-gray-500">My Profile</p>
                        </a>
                        <div class="px-4 mt-[5px] grid">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-button type="submit" style="link">
                                    {{__('Logout')}}
                                </x-button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
