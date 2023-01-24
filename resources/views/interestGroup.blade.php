<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <input id="category-selected" type="hidden" value="cow">
            <x-nav-link-btn class="nav-link-categories" data-type="cow">
                <img src="img/cow.svg" alt="cow">
                {{ __('Sapi') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="nav-link-categories" data-type="poultry">
                <img src="img/duck.svg" alt="poultry">
                {{ __('Unggas') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="nav-link-categories" data-type="goat">
                <img src="img/goat.svg" alt="goat">
                {{ __('Kambing') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="nav-link-categories" data-type="sheep">
                <img src="img/sheep.svg" alt="sheep">
                {{ __('Domba') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="nav-link-categories" data-type="fish">
                <img src="img/fish.svg" alt="fish">
                {{ __('Ikan') }}
            </x-nav-link-btn>

            {{-- :href="route('interestGroup')" :active="request()->routeIs('interestGroup')" --}}
            <x-nav-link-btn class="nav-link-categories" data-type="other">
                <img src="img/other.svg" alt="other">
                {{ __('Lainnya') }}
            </x-nav-link-btn>
        </div>
    </x-slot>

    <div class="flex justify-center mt-0 lg:mt-4">
        <div class="py-0 lg:py-2">
            @include('layouts.postsNavgation', ['type' => 'interestGroup'])

            @include('post.posts', ['posts' => $posts])

        </div>

        {{-- Tags --}}
        <div class="py-2">
            @include('layouts.tags', ['tags' => $tags])
        </div>

    </div>

    @include('layouts.floatingButton')

</x-app-layout>
