{{-- Post Discussion --}}
@if ($posts->count())
    @foreach ($posts as $post)
        <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 flex-col">
            <div class="bg-white overflow-hidden shadow-lg px-10 py-2 border-b-2">
                {{-- User --}}
                <a href="{{ route('user.showSpecific', $post->user->username) }}" class="flex justify-between">
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
                    <div class="p-4 bg-emerald-50 rounded-md">
                        {!! $post->content !!}
                    </div>

                </a>

                {{-- Images --}}
                <div class="flex justify-between mt-4">
                    <img src="https://source.unsplash.com/1200x400/?livestock"
                        class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                        alt="livestock">
                    <img src="https://source.unsplash.com/1200x400/?livestock"
                        class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                        alt="livestock">
                    <img src="https://source.unsplash.com/1200x400/?livestock"
                        class="rounded-md aspect-square object-cover content_pict_post border-2 border-gray-200"
                        alt="livestock">
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

                {{-- Reaction --}}
                <div class="mt-4 text-cyan-900 flex justify-end space-x-2">
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

                    {{-- Comment  --}}
                    <div class="flex items-center">
                        <a href="{{ route('post.show', $post->id) }}" class="flex items-center space-x-1">
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
@else
    {{-- TODO : Buat Halaman untuk jika tidak ada postingan --}}
@endif
