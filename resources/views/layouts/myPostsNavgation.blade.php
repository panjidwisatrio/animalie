<div class="max-w-4xl lg:mx-auto sm:text-sm py-0 px-0 md:py-0 lg:py-0 lg:px-8 relative">
    <div class="bg-white overflow-hidden lg:shadow-lg lg:rounded-t-xl static">
        <div
            class="px-1 py-4 lg:p-6 lg:text-mf text-cyan-900 flex justify-between lg:justify-between border-b-2 sm:border-gray-200">
            {{-- Sub Navigation --}}
            <div class="space-x-8 lg:hidden sm:visible flex items-center absolute">
                <x-dropdown align="top" width="48" class="ml-3" class="">
                    <x-slot name="trigger" class="">
                        <button
                            class="inline-flex items-center py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-900 bg-inherit focus:outline-none transition ease-in-out duration-50 focus:bg-green-200">
                            <h2 class="text-sm mx-2">
                                Sort by
                            </h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" transform="rotate(90)"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart">
                                <line x1="12" y1="20" x2="12" y2="10"></line>
                                <line x1="18" y1="20" x2="18" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="16"></line>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="static">
                        <x-dropdown-link :href="route('profile.show')">
                            {{ __('My Post') }}
                        </x-dropdown-link>
                        <x-dropdown-link>
                            {{ __('Discussion') }}
                        </x-dropdown-link>
                        <x-dropdown-link>
                            {{ __('Saved Post') }}
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>
            <div class="hidden space-x-8 lg:-my-px lg:ml-4 lg:flex ">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('My Post') }}
                </x-nav-link>
            </div>
            <div class="hidden space-x-8 lg:-my-px lg:ml-4 lg:flex">
                {{-- :href="route('dashboard')" :active="request()->routeIs('dashboard')" --}}
                <x-nav-link>
                    {{ __('Discussion') }}
                </x-nav-link>
            </div>
            <div class="hidden space-x-8 lg:-my-px lg:ml-4 lg:flex">
                {{-- :href="route('dashboard')" :active="request()->routeIs('dashboard')" --}}
                <x-nav-link>
                    {{ __('Saved Post') }}
                </x-nav-link>
            </div>

            {{-- Search bar --}}
            <div class="sm:mr-4 space-x-8 lg:-my-px lg:flex ml-24 md:ml-24 lg:ml-10">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="flex justify-start">
                        <input type="text" id="simple-search"
                            class="bg-emerald-100 border-emerald-100 text-cyan-900 text-sm rounded-l-lg  dark:placeholder-gray-400 dark:text-green dark:focus:ring-emerald-100 dark:focus:border-emering-emerald-100 focus:ring-emerald-100 focus:border-emering-emerald-100 block w-full pl-10 p-2"
                            placeholder="Search..." required>
                        <button type="submit"
                            class="p-2 text-sm font-medium text-cyan-900 bg-emerald-100 rounded-r-lg border-emerald-100 ">
                            <i data-feather="search"></i>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
