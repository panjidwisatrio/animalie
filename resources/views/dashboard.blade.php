<x-app-layout>
    <div class="flex justify-center sm:mt-0 lg:mt-6">
        {{-- Content --}}
        <div class="lg:py-2 sm:py-0">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 lg:mb-4 hidden md:visible lg:visible">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                    <a href="{{ route('post.create') }}" class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-cyan-900 leading-tight ml-2">
                            {{ __('Create New Post') }}
                        </h2>
                        <button class="rounded-full bg-cyan-900 p-2 text-white">
                            <i data-feather="edit-3"></i>
                        </button>
                    </a>
                </div>
            </div>

            @include('layouts.postsNavgation')

            @include('post.posts', ['posts' => $posts])

            @include('layouts.floatingButton')

        </div>

        {{-- Tags --}}
        <div class="py-2">
            @include('layouts.tags', ['tags' => $tags])
        </div>
    </div>
</x-app-layout>
