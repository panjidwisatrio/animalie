@foreach ($posts as $post)
    <div class="container max-w-4xl mx-auto lg:px-8 flex-col">
        <div class="bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2">
            {{-- User --}}
            <a href="{{ route('user.showSpecific', $post->user->username) }}" class="flex justify-between">
                <div class="flex">
                    <div>
                        @if ($post->user->avatar == null)
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/img/profile.png') }}" alt="avatar">
                        @else
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/storage/' . $post->user->avatar) }}" alt="avatar">
                        @endif
                    </div>
                    <div>
                        <h2 class="text-sm sm:text-sm md:text-lg lg:text-lg font-semibold text-cyan-900">
                            {{ $post->user->name }} </h2>
                        <small class="text-sm text-cyan-900">{{ $post->user->username }}</small>
                    </div>
                </div>
                <div class="">
                    <small
                        class="text-xs lg:text-sm text-cyan-900">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </div>
            </a>

            {{-- Post Body  --}}
            <a href="{{ route('post.show', $post->slug) }}" class="mt-4 text-cyan-900 text-justify">
                <h1 class="text-md sm:text-md lg:text-xl font-weight-bold my-2">{{ $post->title }}</h1>
                <div class="px-4 bg-emerald-50 rounded-md py-2 text-limit">
                    <span class="text-limit-concat text-cyan-900 text-sm lg:text-md ">
                        {!! $post->content !!}
                    </span>
                </div>
            </a>

            {{-- Images --}}
            {{-- <div class="flex justify-between mt-4">
            <img src="https://source.unsplash.com/1200x400/?livestock"
                class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                alt="livestock">
            <img src="https://source.unsplash.com/1200x400/?livestock"
                class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                alt="livestock">
                <img src="https://source.unsplash.com/1200x400/?livestock"
            class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                alt="livestock">
            </div> --}}

            {{-- Badges/Tags --}}
            <div class="mt-4">
                @if ($post->tag()->get() != null)
                    @foreach ($post->tag()->get() as $tag)
                        <a href="{{ route('post.tag', $tag->slug) }}">
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag->name_tag }}</span>
                        </a>
                    @endforeach
                @endif
            </div>

            {{-- Reaction --}}
            <div class="mt-4 text-cyan-900 flex space-x-2">
                {{-- Save post  --}}
                <div class="flex items-center">
                    @if (Auth::check())
                        <button class="save-button flex items-center space-x-1" data-id="{{ $post->id }}"
                            data-saved="{{ $post->saved(auth()->user()->id) ? 'true' : 'false' }}">
                            <i id="icon-save-{{ $post->id }}" class="iconify"
                                data-icon="{{ $post->saved(auth()->user()->id) ? 'ic:twotone-bookmark' : 'ic:twotone-bookmark-border' }}"
                                style="color: #164e63;" data-width="24" data-height="24"></i>
                        </button>
                    @else
                        <button class="save-button flex items-center space-x-1">
                            <i id="icon-save-{{ $post->id }}" class="iconify"
                                data-icon="ic:twotone-bookmark-border" style="color: #164e63;" data-width="24"
                                data-height="24"></i>
                        </button>
                    @endif
                </div>
                <div class="flex justify-end w-full">
                    {{-- Like  --}}
                    <div class="flex items-center">
                        @if (Auth::check())
                            <button class="like-button flex items-center space-x-1" data-id="{{ $post->id }}"
                                data-liked="{{ $post->liked(auth()->user()->id) ? 'true' : 'false' }}">
                                <i id="icon-{{ $post->id }}" class="iconify"
                                    data-icon="{{ $post->liked(auth()->user()->id) ? 'ant-design:like-twotone' : 'ant-design:like-outlined' }}"
                                    style="color: #164e63;" data-width="24" data-height="24"></i>
                                <small id="like-count-{{ $post->id }}" class="font-semibold">
                                    {{ $post->likeCount }}
                                </small>
                            </button>
                        @else
                            <form method="POST" action="{{ route('like.post', $post->id) }}">
                                @csrf
                                <button class="like-button flex items-center space-x-1"
                                    id="like-button-unauthenticated">
                                    <i id="icon-{{ $post->id }}" class="iconify"
                                        data-icon="ant-design:like-outlined" style="color: #164e63;" data-width="24"
                                        data-height="24"></i>
                                    <small id="like-count-{{ $post->id }}" class="font-semibold">
                                        {{ $post->likeCount }}
                                    </small>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                {{-- Comment  --}}
                <div class="flex items-center">
                    <a href="{{ route('post.show', $post->slug) }}" class="flex items-center space-x-1">
                        <i data-icon="mdi:message-reply-outline" class="iconify" data-height="24" data-width="24"></i>
                        <small class="font-semibold">
                            {{ $post->comment->count() }}
                        </small>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
