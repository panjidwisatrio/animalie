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
                                            data-icon="ant-design:like-outlined" style="color: #164e63;" data-width="24"
                                            data-height="24"></i>
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
    <div id="more-contents"></div>
@else
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
        <div class="bg-white overflow-hidden shadow-sm rounded-md p-10">
            <div class="text-center">
                <h2 class="text-lg font-semibold text-cyan-900">No Comments Yet</h2>
            </div>
        </div>
    </div>
@endif
