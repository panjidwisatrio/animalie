<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        {{-- Content --}}
        <div class="py-2">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between px-4">
                    <div class="text-gray-900">
                        <h2 class="m-6">Create New Post</h2>
                    </div>
                    <div class="m-6">
                        <button type="button"
                            class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-lime-600 dark:hover:bg-lime-700">
                            <i data-feather="edit-3"></i>
                            <span class="sr-only">Icon description</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-t-xl">
                    <div class="p-6 text-gray-900 flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
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
                </div>
            </div>

            {{-- Post Discussion --}}
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm p-10">
                    {{-- User --}}
                    <div class="flex justify-between">
                        <div class="">
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                alt="avatar">
                            <h2 class="text-lg font-semibold text-gray-9001">Brad Adams </h2>
                            <small class="text-sm text-gray-700">@brad_dd</small>
                        </div>
                        <div class="">
                            <small class="text-sm text-gray-700">22h ago</small>
                        </div>
                    </div>

                    {{-- Post Body  --}}
                    <div class="">
                        <p class="mt-3 text-gray-700 text-sm text-justify">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam dolorum assumenda
                            perferendis
                            aliquid tenetur architecto at, fuga sed culpa repellat repudiandae eum voluptas maiores
                            neque
                            sint eaque enim nobis quisquam autem vero sunt nisi reprehenderit! Voluptas quia ab aliquid
                            assumenda tempora delectus, laboriosam quibusdam, eos dolorem corrupti dolorum quidem
                            laudantium
                            obcaecati esse blanditiis ad. Libero ut voluptatibus ullam necessitatibus reiciendis fugit
                            non
                            minus possimus nam provident quaerat accusantium sit architecto dignissimos molestias
                            laboriosam
                            optio accusamus atque nulla quas laborum officiis, sunt expedita. Magnam tempora,
                            repellendus
                            provident quibusdam dolorum cumque distinctio aperiam ad ullam? Quo ducimus aspernatur
                            dignissimos enim modi, iste, pariatur minus consequatur vel delectus, quod reiciendis nulla
                            cupiditate exercitationem eius at? Mollitia ullam exercitationem necessitatibus, nostrum
                            dolores
                            officiis ipsam.
                        </p>

                        {{-- Images --}}
                        <div class="flex justify-start">
                            <img src="https://source.unsplash.com/1200x400/?livestock"
                                class="max-w-xs h-1/3 rounded-md mr-2 aspect-square object-cover" alt="livestock">

                        </div>

                        {{-- Badges/Tags --}}
                        <div class="mt-4">
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Green</span>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Yellow</span>

                        </div>

                        {{-- Interaction --}}
                        <div class="mt-4 flex justify-between">
                            <div class="flex mr-2 text-gray-700 text-sm mr-3">
                                <i data-feather="bookmark"></i>
                                <span>12</span>
                            </div>
                            <div class="inline">
                                <div class="inline-flex mr-2 text-gray-700 text-sm mr-3">
                                    <i data-feather="message-square"></i>
                                    <span>12</span>
                                </div>
                                <div class="inline-flex mr-2 text-gray-700 text-sm mr-3">
                                    <i data-feather="thumbs-up"></i>
                                    <span>12</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tags --}}
        <div class="py-2">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 py-10">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 ">
                    <div class="text-gray-900">
                        <h3>Popular Tags</h3>
                    </div>

                    {{-- Tags --}}
                    <div class="mt-2">
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
                        <span
                            class="bg-gray-100 text-gray-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Dark</span>
                        <span
                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Red</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
