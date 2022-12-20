{{-- Post Discussion --}}
{{-- TODO : Add Escape Blade --}}
@if ($posts->count())
    @foreach ($posts as $post)
        <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 flex-col">
            <div class="bg-white overflow-hidden shadow-lg px-10 py-2 border-b-2">
                {{-- User --}}
                <a href="#" class="flex justify-between">
                    <div class="flex">
                        <div>
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/storage/' . $post->user->avatar) }}" alt="avatar">
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-cyan-900">{{ $post->user->name }} </h2>
                            <small class="text-sm text-cyan-900">{{ $post->user->username }}</small>
                        </div>
                    </div>
                    <div class="">
                        <small
                            class="text-sm text-cyan-900">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                    </div>
                </a>

                {{-- Post Body  --}}
                <a href="{{ route('post.show', $post->slug) }}" class="mt-4 text-cyan-900 text-sm text-justify">
                    <h1 class="text-xl font-weight-bold my-2">{{ $post->title }}</h1>
                    <div class="px-4 bg-emerald-50 rounded-md py-2 text-limit">
                        <span class="text-limit-concat text-cyan-900">
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
                    <a href="#">
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
                    </a>

                    <a href="#">
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Green</span>
                    </a>

                    <a href="#">
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Yellow</span>
                    </a>

                </div>

                {{-- Reaction --}}
                <div class="mt-4 text-cyan-900 flex justify-end space-x-2">
                    {{-- Like  --}}
                    <div class="flex items-center">
                        <form method="POST" action="{{ route('like.post', $post->id) }}">
                            @csrf
                            <button class="flex items-center space-x-1">
                                <i data-feather="thumbs-up"></i>
                                <small class="font-semibold">
                                    {{-- {{ $post->likeCount }} --}}
                                </small>
                            </button>
                        </form>
                    </div>

                    {{-- Unlike  --}}
                    <div class="flex items-center">
                        <form method="POST" action="{{ route('unlike.post', $post->id) }}">
                            @csrf
                            <button class="flex items-center space-x-1">
                                <i data-feather="thumbs-down"></i>
                            </button>
                        </form>
                    </div>

                    {{-- Comment  --}}
                    <div class="flex items-center">
                        <a href="{{ route('post.show', $post->slug) }}" class="flex items-center space-x-1">
                            <i data-feather="message-square"></i>
                            {{-- <small class="font-semibold">
                                12
                            </small> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    {{-- TODO : Buat Halaman untuk jika tidak ada postingan --}}
    <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 flex-col">

    </div>
@endif
