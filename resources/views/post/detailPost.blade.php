{{-- TODO : Add Escape Blade --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-900 leading-tight">
            {{ __('Detail Post') }}
        </h2>
    </x-slot>

    {{-- Post Discussion --}}
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 ">
        <div class="bg-white overflow-hidden shadow-sm rounded-md p-10">
            {{-- User --}}
            <div class="flex justify-between">
                <div class="flex">
                    <div>
                        @if ($post->user->avatar == null)
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/img/0profile.png') }}" alt="avatar">
                        @else
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/storage/' . $post->user->avatar) }}" alt="avatar">
                        @endif
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-cyan-900">{{ $post->user->name }}</h2>
                        <small class="text-sm text-cyan-900">{{ $post->user->username }}</small>
                    </div>
                </div>
                <div class="">
                    <small
                        class="text-sm text-cyan-900">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </div>
            </div>

            {{-- Post Body  --}}
            <div class="mt-4 text-cyan-900 text-sm text-justify">
                <h1 class="text-2xl font-weight-bolder my-2">{{ $post->title }}</h1>
                <div class="p-4 bg-emerald-50 rounded-md text-md">
                    {!! $post->content !!}
                </div>

                {{-- Badges/Tags --}}
                <div class="mt-4">
                    <span id="badge-dismiss-default"
                        class="inline-flex items-center py-1 px-2 mr-2 text-sm font-medium text-blue-900 bg-blue-100 rounded dark:bg-blue-200 dark:text-blue-900">
                        Default
                        <button type="button"
                            class="inline-flex items-center p-0.5 ml-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-300 dark:hover:text-blue-900"
                            data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                        </button>
                    </span>
                </div>
                {{-- Like  --}}
                <div class="flex justify-end">
                    <div class="flex items-center">
                        <form method="POST" action="{{ route('like.post', $post->id) }}">
                            @csrf
                            <button class="flex items-center space-x-1">
                                <i data-feather="thumbs-up"></i>
                                <small class="font-semibold">
                                    {{ $post->likeCount }}
                                </small>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- comment form -->
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 rounded-md">
        <form method="POST" action="" class="bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-cyan-900 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                        class="bg-white rounded border border-cyan-900 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-500 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment..' required></textarea>
                </div>
                <div class="w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-cyan-900 px-2 mr-auto">
                        <svg fill="none" class="w-5 h-5 text-cyan-900 mr-1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <div class="mt-4 -mr-1 flex justify-end">
                        <x-primary-button class="ml-3">
                            {{ __('Send') }}
                        </x-primary-button>
                    </div>
                </div>
        </form>
    </div>
</x-app-layout>
