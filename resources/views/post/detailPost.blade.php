{{-- TODO : Add Escape Blade --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-900 leading-tight">
            {{ __('Detail Post') }}
        </h2>
    </x-slot>

    {{-- TODO : Terdapat bug pada bagian bawah setelah section comment --}}
    {{-- Post Discussion --}}
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg p-10">
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
                    @if ($post->tag()->get() != null)
                        @foreach ($post->tag()->get() as $tag)
                            <a href="{{ route('post.tag', $tag->slug) }}">
                                <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag->name_tag }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>

                {{-- Like  --}}
                <div class="flex justify-end">
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
                                <button class="like-button flex items-center space-x-1">
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
            </div>
        </div>
    </div>

    <!-- comment form -->
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 rounded-md py-2">
        <form method="POST" action="" class="bg-white px-4 pt-2 border-gray-200 border-b-2 rounded-t-lg">
            <div class="flex flex-wrap mx-3 space-x-4">
                <h2 class="px-4 pt-2 pb-2 text-cyan-900 text-md">Add a new comment</h2>
                <div class="w-full md:w-full m-2">
                    <textarea
                        class="border-gray-300 focus:border-green-400 focus:ring-green-400 bg-emerald-50 rounded-md leading-normal resize-none w-full h-20 py-2 px-3 font-normal text-sm placeholder-gray-500 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment..' required></textarea>
                </div>
                <div class="w-full flex items-start md:w-full">
                    <div class="w-full flex justify-end m-4">
                        <x-primary-button class="ml-3">
                            {{ __('Send') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>

        {{-- Comments post --}}
        <div class="bg-white p-12 space-y-4 text-cyan-900">
            {{-- username --}}
            <a href="{{ route('user.showSpecific', $post->user->username) }}" class="flex justify-between">
                <div class="flex">
                    <div>
                        @if ($post->user->avatar == null)
                            <img class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/img/0profile.png') }}" alt="avatar">
                        @else
                            <img class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('/storage/' . $post->user->avatar) }}" alt="avatar">
                        @endif
                    </div>
                    <div>
                        <h2 class="text-md font-semibold">{{ $post->user->name }} </h2>
                        <small class="text-sm">{{ $post->user->username }}</small>
                    </div>
                </div>
                <div class="">
                    <small class="text-xs">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </div>
            </a>

            {{-- comment field --}}
            <div class="ml-6 rounded-md ">
                <p class="text-ls">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nulla, nisi voluptate porro
                    consequuntur
                    molestiae? Aspernatur nisi temporibus labore quos minima odit quia esse commodi! Temporibus minus
                    perspiciatis et ea suscipit deserunt molestiae quod. Ratione iusto debitis odio dolorem, qui rerum
                    ullam
                    odit quam soluta reprehenderit explicabo quas enim iste dicta nostrum accusamus quod, vitae neque
                    quis
                    minima? Rem dolores odio labore illo aliquam nemo minus amet,
                </p>
            </div>

            {{-- TODO: fix like for comment --}}
            <div class="flex justify-end">
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
                            <button class="like-button flex items-center space-x-1">
                                <i id="icon-{{ $post->id }}" class="iconify" data-icon="ant-design:like-outlined"
                                    style="color: #164e63;" data-width="24" data-height="24"></i>
                                <small id="like-count-{{ $post->id }}" class="font-semibold">
                                    {{ $post->likeCount }}
                                </small>
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @push('script')
        {{-- Like Script --}}
        <script type="text/javascript">
            const button = document.querySelectorAll('.like-button');

            button.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const likeCount = document.getElementById('like-count-' + id);

                    axios.post('/like-post/' + id).then(function(response) {
                        if (response.data.liked == true) {
                            document.getElementById("icon-" + id).dataset.icon =
                                "ant-design:like-twotone";
                            button.setAttribute('data-liked', 'true');
                        } else {
                            document.getElementById("icon-" + id).dataset.icon =
                                "ant-design:like-outlined";
                        }

                        button.setAttribute('data-liked', response.data.liked);

                        likeCount.innerHTML = response.data.likeCount;
                    }).catch(function(error) {
                        console.log(error.response.data);
                    });
                });
            })
        </script>
    @endpush
</x-app-layout>
