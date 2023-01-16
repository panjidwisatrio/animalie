<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3 class="rounded-md bg-white p-2 font-semibold text-cyan-800 leading-tight ml-2 flex justify-start">
                # {{ $tag->name_tag }}
            </h3>
        </div>
    </x-slot>

    <div class="flex justify-center mt-0 lg:mt-4">
        <div class="py-2">
            @include('layouts.postsNavgation')

            @include('post.posts', ['posts' => $posts])

            {{-- Tags --}}
            {{-- <div class="py-2">
                @include('layouts.tags', ['tags' => $tags])
            </div> --}}
        </div>
    </div>

    @include('layouts.floatingButton')

</x-app-layout>
