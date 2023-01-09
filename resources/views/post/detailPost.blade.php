{{-- TODO : Add Escape Blade --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-900 leading-tight">
            {{ __('Detail Post') }}
        </h2>
    </x-slot>

    {{-- Post Discussion --}}
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
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
        <form class="bg-white rounded-lg px-4 pt-2" id="form-comment">
            <div class="flex flex-wrap mx-3 space-x-4">
                <h2 class="px-4 pt-2 pb-2 text-cyan-900 text-md">Add a new comment</h2>
                <div class="w-full md:w-full m-2">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $post->id }}" id="post_id">
                    <textarea id="body"
                        class="border-gray-300 focus:border-green-400 focus:ring-green-400 bg-emerald-50 rounded-md leading-normal resize-none w-full h-20 py-2 px-3 font-normal text-sm placeholder-gray-500 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment..' required></textarea>
                </div>
                <div class="w-full flex items-start md:w-full">
                    <div class="flex items-start w-1/2 text-cyan-900 mr-auto">
                        <svg fill="none" class="w-5 h-5 text-cyan-900 mr-1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="mr-1 flex justify-end m-2">
                        <x-primary-button class="comment-button ml-3">
                            {{ __('Send') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- comment section -->
    <div id="new-comments">
        @if ($comments->count())
            @foreach ($comments as $comment)
                <div class="comment max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
                    <div class="bg-white overflow-hidden shadow-sm rounded-md p-10">
                        {{-- User --}}
                        <div class="flex justify-between">
                            <div class="flex">
                                <div>
                                    @if ($comment->user->avatar == null)
                                        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                            src="{{ asset('/img/0profile.png') }}" alt="avatar">
                                    @else
                                        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                            src="{{ asset('/storage/' . $comment->user->avatar) }}" alt="avatar">
                                    @endif
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold text-cyan-900">{{ $comment->user->name }}</h2>
                                    <small class="text-sm text-cyan-900">{{ $comment->user->username }}</small>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <small
                                    class="text-sm text-cyan-900">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>

                                {{-- Delete Comment --}}
                                @if (Auth::check())
                                    @if (Auth::user()->id == $comment->user_id)
                                        <form id="comment-delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" value="{{ $comment->id }}" id="comment_id">
                                            <button type="submit" class="ml-2">
                                                <i class="iconify" data-icon="ant-design:delete-outlined"
                                                    style="color: #164e63;" data-width="24" data-height="24"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>

                        {{-- Comment  --}}
                        <div class="mt-4 text-cyan-900 text-sm text-justify">
                            <div class="p-4 bg-emerald-50 rounded-md text-md">
                                {{ $comment->comment }}
                            </div>

                            {{-- Like  --}}
                            <div class="flex justify-end">
                                <div class="flex items-center">
                                    @if (Auth::check())
                                        <button class="like-button-comment flex items-center space-x-1"
                                            data-id="{{ $comment->id }}"
                                            data-liked="{{ $comment->liked(auth()->user()->id) ? 'true' : 'false' }}">
                                            <i id="icon-{{ $comment->id }}" class="iconify"
                                                data-icon="{{ $comment->liked(auth()->user()->id) ? 'ant-design:like-twotone' : 'ant-design:like-outlined' }}"
                                                style="color: #164e63;" data-width="24" data-height="24"></i>
                                            <small id="comment-count-{{ $comment->id }}" class="font-semibold">
                                                {{ $comment->likeCount }}
                                            </small>
                                        </button>
                                    @else
                                        <form method="POST" action="{{ route('like.comment', $comment->id) }}">
                                            @csrf
                                            <button class="like-button flex items-center space-x-1">
                                                <i id="icon-{{ $comment->id }}" class="iconify"
                                                    data-icon="ant-design:like-outlined" style="color: #164e63;"
                                                    data-width="24" data-height="24"></i>
                                                <small id="like-count-{{ $comment->id }}" class="font-semibold">
                                                    {{ $comment->likeCount }}
                                                </small>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
                <div class="bg-white overflow-hidden shadow-sm rounded-md p-10">
                    <div class="text-center">
                        <h2 class="text-lg font-semibold text-cyan-900">No Comments Yet</h2>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $('#comment-delete').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/comment/delete',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment_id: $('#comment_id').val(),
                },
                success: function(response) {
                    reloadComment();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })

        $('#form-comment').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/comment',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    body: $('#body').val(),
                    post_id: $('#post_id').val(),
                },
                success: function(response) {
                    reloadComment();
                },
                error: function(error, response) {
                    console.log(error);
                }
            })
        })

        function reloadComment() {
            $.ajax({
                url: '/comment/reload',
                success: function(response) {
                    // BUG: CSRF token transfered to url
                    $('#new-comments').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>

    @push('script')
        {{-- Like Script --}}
        <script type="text/javascript">
            const buttonComment = document.querySelectorAll('.like-button-comment');
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

            buttonComment.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const likeCount = document.getElementById('comment-count-' + id);

                    axios.post('/like-comment/' + id).then(function(response) {
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
