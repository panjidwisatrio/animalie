<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/cow.svg" alt="cow">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2 ">
                    Sapi
                </h3>
            </a>
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/duck.svg" alt="duck">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2">
                    Unggas
                </h3>
            </a>
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/goat.svg" alt="goat">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2">
                    Kambing
                </h3>
            </a>
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/sheep.svg" alt="sheep">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2">
                    Domba
                </h3>
            </a>
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/fish.svg" alt="fish">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2">
                    Ikan
                </h3>
            </a>
            <a href="#"
                class="flex justify-start items-center rounded-full px-4 hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="">
                    <img src="img/other.svg" alt="other">
                </div>
                <h3 class="font-semibold text-cyan-800 leading-tight ml-2">
                    Lainnya
                </h3>
            </a>
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
</x-app-layout>
