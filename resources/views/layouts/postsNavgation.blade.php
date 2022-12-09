<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-t-xl">
        <div class="p-6 text-cyan-900 flex justify-between">
            <div class="flex justify-start">
                {{-- Sub Navigation --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex ">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> --}}
                    <x-nav-link>
                        {{ __('Latest') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> --}}
                    <x-nav-link>
                        {{ __('Populer') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> --}}
                    <x-nav-link>
                        {{ __('Unanswered') }}
                    </x-nav-link>
                </div>
            </div>

            {{-- Search bar --}}
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="flex justify-start ">
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
