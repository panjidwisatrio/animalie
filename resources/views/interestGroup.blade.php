<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-nav-link-btn :href="route('interestGroup')" :active="request()->routeIs('interestGroup')">
                <img src="img/cow.svg" alt="cow" class="">
                {{ __('Sapi') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="">
                <img src="img/duck.svg" alt="cow" class="">
                {{ __('Unggas') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/goat.svg" alt="cow" class="">
                {{ __('Kambing') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/sheep.svg" alt="cow" class="">
                {{ __('Domba') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/fish.svg" alt="cow" class="">
                {{ __('Ikan') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn>
                <img src="img/other.svg" alt="cow" class="">
                {{ __('Lainnya') }}
            </x-nav-link-btn>
        </div>
    </x-slot>

    <div class="flex justify-center mt-0 lg:mt-4">
        <div class="py-0 lg:py-2">
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
