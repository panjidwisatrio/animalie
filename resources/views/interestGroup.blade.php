<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-nav-link-btn :href="route('interestGroup')" :active="request()->routeIs('interestGroup')">
                <img src="img/cow.svg" alt="cow" class="mr-2">
                {{ __('Sapi') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/duck.svg" alt="cow" class="mr-2">
                {{ __('Unggas') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/goat.svg" alt="cow" class="mr-2">
                {{ __('Kambing') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/sheep.svg" alt="cow" class="mr-2">
                {{ __('Domba') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/fish.svg" alt="cow" class="mr-2">
                {{ __('Ikan') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/other.svg" alt="cow" class="mr-2">
                {{ __('Lainnya') }}
            </x-nav-link-btn>
        </div>
    </x-slot>

    <div class="flex justify-center mt-4">
        <div class="py-2">
            @include('layouts.postsNavgation')

            @include('post.posts', ['posts' => $posts])

        </div>

        {{-- Tags --}}
        <div class="py-2">
            @include('layouts.tags', ['tags' => $tags])
        </div>

    </div>

    @include('layouts.floatingButton')

</x-app-layout>
