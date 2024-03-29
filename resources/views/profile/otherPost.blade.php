{{-- Post Discussion --}}
<div class="other-post-target">
    @if ($posts->count())
        <div class="post-data">
            @foreach ($posts as $post)
                <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 flex-col">
                    <div class="bg-white overflow-hidden shadow-lg px-10 py-4 border-b-2">
                        {{-- User --}}
                        <div class="flex justify-between">
                            <a href="#" class="flex justify-between">
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
                            </a>

                            <div class="flex justify-end">
                                <small
                                    class="text-sm text-cyan-900">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>

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
                                    <button class="save-button flex items-center space-x-1"
                                        data-id="{{ $post->id }}"
                                        data-saved="{{ auth()->user()->hasBookmarked($post->find($post->id))? 'true': 'false' }}">
                                        <i id="icon-save-{{ $post->id }}" class="iconify"
                                            data-icon="{{ auth()->user()->hasBookmarked($post->find($post->id))? 'ic:twotone-bookmark': 'ic:twotone-bookmark-border' }}"
                                            style="color: #164e63;" data-width="24" data-height="24"></i>
                                    </button>
                                @else
                                    <form method="POST" action="{{ route('savedPost', $post->id) }}">
                                        @csrf
                                        <button class="save-button flex items-center space-x-1">
                                            <i id="icon-save-{{ $post->id }}" class="iconify"
                                                data-icon="ic:twotone-bookmark-border" style="color: #164e63;"
                                                data-width="24" data-height="24"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="flex justify-end w-full">
                                {{-- Like  --}}
                                <div class="flex items-center">
                                    @if (Auth::check())
                                        <button class="like-button flex items-center space-x-1"
                                            data-id="{{ $post->id }}"
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
                                                    data-icon="ant-design:like-outlined" style="color: #164e63;"
                                                    data-width="24" data-height="24"></i>
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
                                        <i data-icon="mdi:message-reply-outline" class="iconify" data-height="24"
                                            data-width="24"></i>
                                        <small class="font-semibold">
                                            {{ $post->comment->count() }}
                                        </small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 flex-col">
            <div class="bg-white overflow-hidden shadow-lg px-10 py-4 border-b-2 rounded-b-xl">
                <div class="py-6 w-full text-center text-cyan-900 mt-4">
                    <svg class="mx-auto" width="300" height="256" viewBox="0 0 300 256" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.1"
                            d="M298.624 176.34C290.431 135.021 242.426 101.998 233.063 58.9405C216.046 4.16004 159.957 -4.50085 123.509 19.2903C65.7565 56.9876 127.366 66.3425 14.133 155.532C-13.8267 177.555 -4.91748 274.768 83.0423 252.458C130.378 240.452 144.768 238.767 166.06 236.79C219.728 231.807 312.379 245.699 298.624 176.34Z"
                            fill="#55C595" />
                        <path d="M234.512 186.696L151.564 230.505L68.7412 186.696V120.54H234.512V186.696Z"
                            fill="white" />
                        <path
                            d="M151.564 231.177C151.454 231.177 151.346 231.15 151.25 231.098L68.4293 187.289C68.3216 187.232 68.2314 187.147 68.1683 187.043C68.1053 186.939 68.0717 186.82 68.0713 186.698V120.54C68.0713 120.362 68.1421 120.191 68.2681 120.065C68.3941 119.939 68.565 119.868 68.7432 119.868H234.512C234.691 119.868 234.861 119.939 234.987 120.065C235.113 120.191 235.184 120.362 235.184 120.54V186.696C235.184 186.818 235.15 186.937 235.087 187.041C235.024 187.145 234.934 187.23 234.826 187.287L151.878 231.097C151.782 231.149 151.674 231.176 151.564 231.177V231.177ZM69.413 186.292L151.564 229.745L233.84 186.291V121.212H69.413V186.292Z"
                            fill="#25522F" />
                        <path d="M234.513 106.344L151.564 62.5351L188.838 44.5688L271.786 88.3786L234.513 106.344Z"
                            fill="white" />
                        <path
                            d="M234.513 107.016C234.403 107.016 234.296 106.99 234.199 106.939L151.25 63.1291C151.141 63.0709 151.049 62.9835 150.986 62.8764C150.923 62.7693 150.89 62.6468 150.893 62.5224C150.895 62.3981 150.932 62.2769 150.999 62.1722C151.066 62.0675 151.161 61.9834 151.272 61.9293L188.546 43.963C188.641 43.9171 188.745 43.8942 188.85 43.8961C188.956 43.8981 189.059 43.9249 189.152 43.9743L272.1 87.7841C272.21 87.8422 272.302 87.9296 272.365 88.0366C272.428 88.1437 272.46 88.2662 272.458 88.3905C272.456 88.5148 272.419 88.636 272.352 88.7406C272.285 88.8453 272.19 88.9293 272.078 88.9833L234.804 106.95C234.713 106.994 234.614 107.016 234.513 107.016V107.016ZM153.055 62.5615L234.527 105.591L270.296 88.3501L188.824 45.3219L153.055 62.5615Z"
                            fill="#25522F" />
                        <path d="M68.7415 106.344L151.69 62.5351L114.416 44.5688L31.4678 88.3786L68.7415 106.344Z"
                            fill="white" />
                        <path
                            d="M68.7414 107.016C68.6403 107.016 68.5405 106.994 68.4495 106.95L31.1778 88.9833C31.0659 88.9293 30.9711 88.8453 30.904 88.7406C30.837 88.636 30.8002 88.5148 30.798 88.3905C30.7957 88.2662 30.8279 88.1437 30.8911 88.0366C30.9543 87.9296 31.0459 87.8422 31.1558 87.7841L114.104 43.9743C114.197 43.9249 114.3 43.8981 114.406 43.8961C114.511 43.8942 114.615 43.9171 114.71 43.963L151.984 61.9293C152.096 61.9834 152.19 62.0675 152.257 62.1722C152.324 62.2769 152.361 62.3981 152.363 62.5224C152.366 62.6468 152.333 62.7693 152.27 62.8764C152.207 62.9835 152.116 63.0709 152.006 63.1291L69.0574 106.939C68.96 106.99 68.8515 107.017 68.7414 107.016ZM32.9582 88.3512L68.7274 105.592L150.199 62.5625L114.43 45.3219L32.9582 88.3512Z"
                            fill="#25522F" />
                        <path d="M68.741 106.344L151.689 150.154L109.04 173.495L26.0918 129.686L68.741 106.344Z"
                            fill="white" />
                        <path
                            d="M109.04 174.167C108.931 174.167 108.823 174.141 108.726 174.089L25.778 130.28C25.6709 130.223 25.5812 130.138 25.5183 130.034C25.4555 129.931 25.4218 129.812 25.4209 129.691C25.42 129.57 25.452 129.45 25.5133 129.346C25.5747 129.241 25.6632 129.155 25.7694 129.097L68.4186 105.755C68.516 105.702 68.6252 105.673 68.7363 105.673C68.8474 105.672 68.9569 105.699 69.0551 105.751L152.003 149.561C152.11 149.617 152.2 149.702 152.263 149.806C152.326 149.909 152.36 150.028 152.36 150.149C152.361 150.271 152.329 150.39 152.268 150.494C152.207 150.599 152.118 150.685 152.012 150.743L109.363 174.085C109.264 174.139 109.153 174.167 109.04 174.167V174.167ZM27.5111 129.675L109.034 172.733L150.271 150.164L68.7471 107.107L27.5111 129.675Z"
                            fill="#25522F" />
                        <path d="M234.512 106.344L151.564 150.154L194.213 173.495L277.161 129.686L234.512 106.344Z"
                            fill="white" />
                        <path
                            d="M194.214 174.167C194.102 174.167 193.991 174.139 193.892 174.085L151.243 150.743C151.136 150.685 151.048 150.599 150.986 150.494C150.925 150.39 150.893 150.271 150.894 150.149C150.895 150.028 150.929 149.909 150.991 149.806C151.054 149.702 151.144 149.617 151.251 149.561L234.199 105.751C234.298 105.699 234.407 105.672 234.518 105.673C234.629 105.673 234.738 105.702 234.836 105.755L277.485 129.097C277.591 129.155 277.68 129.241 277.741 129.346C277.803 129.45 277.834 129.57 277.834 129.691C277.833 129.812 277.799 129.931 277.736 130.034C277.673 130.138 277.584 130.223 277.476 130.28L194.528 174.089C194.432 174.141 194.324 174.167 194.214 174.167V174.167ZM152.985 150.164L194.221 172.733L275.744 129.675L234.508 107.107L152.985 150.164Z"
                            fill="#25522F" />
                        <path d="M151.689 62.5352L68.7412 106.344L151.564 150.154L234.512 106.344L151.689 62.5352Z"
                            fill="#25522F" />
                        <path d="M152.236 150.154H150.892V230.505H152.236V150.154Z" fill="#25522F" />
                        <path
                            d="M105.09 102.367C104.979 102.367 104.87 102.332 104.78 102.268C104.663 102.185 104.585 102.06 104.561 101.919C104.537 101.779 104.569 101.635 104.652 101.518C104.751 101.378 114.466 87.333 103.621 74.5288C101.701 72.2507 99.3066 70.42 96.605 69.165C93.9033 67.9099 90.9599 67.2609 87.9809 67.2633H87.8347C88.8646 70.8412 88.6808 74.0224 87.2224 76.4628C86.601 77.5656 85.6841 78.473 84.5748 79.0827C83.4655 79.6924 82.208 79.9803 80.9439 79.9139C79.8976 79.8282 78.8989 79.4392 78.0703 78.7945C77.2416 78.1499 76.619 77.2775 76.2786 76.2844C75.0858 73.1731 76.3324 70.1564 79.6178 68.2121C81.6991 67.0643 84.0119 66.3991 86.3849 66.2657C85.6129 64.2189 84.6091 62.2672 83.393 60.4489C79.477 54.4682 72.34 50.328 63.8114 49.0901C56.5836 48.0413 49.6568 49.2766 46.1622 52.2363C46.0534 52.3284 45.9124 52.3735 45.7703 52.3617C45.6282 52.3498 45.4966 52.282 45.4045 52.1732C45.3124 52.0643 45.2674 51.9233 45.2792 51.7812C45.291 51.6392 45.3589 51.5076 45.4677 51.4155C49.1864 48.266 56.447 46.9345 63.9656 48.029C72.7991 49.3115 80.2075 53.6243 84.2928 59.8624C85.6173 61.8408 86.6946 63.9739 87.5009 66.2141C90.7144 66.1369 93.9044 66.7816 96.8357 68.1008C99.767 69.42 102.365 71.38 104.438 73.8364C115.83 87.2852 105.63 101.996 105.526 102.143C105.476 102.212 105.411 102.269 105.335 102.308C105.259 102.347 105.175 102.367 105.09 102.367ZM86.7338 67.3026C84.433 67.4007 82.186 68.0287 80.1677 69.1377C77.3316 70.816 76.2813 73.2811 77.2849 75.9C77.5568 76.7025 78.0567 77.4083 78.7235 77.9311C79.3902 78.4539 80.1949 78.771 81.0391 78.8436C82.102 78.8912 83.1571 78.6422 84.0866 78.1245C85.0161 77.6067 85.7832 76.8406 86.3022 75.9119C87.6406 73.6703 87.7632 70.6907 86.7322 67.3026H86.7338Z"
                            fill="#292A2E" />
                        <path
                            d="M36.8846 60.903C35.9711 61.1775 34.9866 61.0845 34.1407 60.6439C33.2948 60.2032 32.6542 59.4498 32.3555 58.544C32.0568 57.6382 32.1235 56.6515 32.5414 55.7941C32.9592 54.9367 33.6953 54.2763 34.5928 53.9535C35.4904 53.6307 36.4784 53.671 37.3467 54.0659C38.2149 54.4607 38.8947 55.1789 39.2414 56.0675C39.588 56.9561 39.5741 57.9449 39.2026 58.8233C38.8311 59.7018 38.1313 60.4006 37.2523 60.7708C37.1322 60.8216 37.0095 60.8657 36.8846 60.903V60.903ZM35.0973 54.9299C35.0102 54.956 34.9246 54.9869 34.8409 55.0223C34.2224 55.2831 33.7301 55.7751 33.469 56.3934C33.2078 57.0117 33.1984 57.7076 33.4427 58.3328C33.687 58.958 34.1658 59.4631 34.777 59.7405C35.3882 60.0179 36.0836 60.0457 36.715 59.8181C37.3464 59.5904 37.864 59.1252 38.1575 58.5215C38.451 57.9178 38.4973 57.2235 38.2864 56.5862C38.0755 55.949 37.6241 55.4193 37.0285 55.1099C36.4328 54.8005 35.7399 54.7359 35.0973 54.9299Z"
                            fill="#292A2E" />
                        <path
                            d="M36.8779 52.4797C36.0138 52.7377 35.0848 52.6672 34.2696 52.2817C33.4543 51.8962 32.8103 51.2229 32.4614 50.3913V50.3913C32.1817 49.7247 32.106 48.99 32.2438 48.2803C32.3816 47.5706 32.7268 46.9176 33.2357 46.4041C33.7446 45.8906 34.3944 45.5395 35.1028 45.3953C35.8113 45.251 36.5466 45.3201 37.2158 45.5938C37.8849 45.8675 38.4579 46.3335 38.8623 46.9328C39.2666 47.5322 39.4841 48.238 39.4873 48.9609C39.4905 49.6839 39.2792 50.3916 38.8802 50.9945C38.4812 51.5974 37.9123 52.0684 37.2456 52.348C37.1254 52.3983 37.0027 52.4422 36.8779 52.4797V52.4797ZM35.0927 46.506C35.0046 46.5324 34.9179 46.5635 34.8331 46.599C34.2025 46.8639 33.7028 47.3683 33.444 48.0014C33.1851 48.6345 33.1883 49.3445 33.4527 49.9753V49.9753C33.6455 50.4351 33.9674 50.8292 34.3796 51.1099C34.7917 51.3906 35.2763 51.5459 35.7748 51.557C36.2733 51.5681 36.7643 51.4345 37.1885 51.1724C37.6127 50.9102 37.9518 50.5308 38.1649 50.08C38.378 49.6292 38.4558 49.1263 38.3891 48.6322C38.3224 48.138 38.1139 47.6738 37.7889 47.2957C37.4639 46.9175 37.0363 46.6416 36.5578 46.5014C36.0793 46.3611 35.5704 46.3625 35.0927 46.5054V46.506Z"
                            fill="#292A2E" />
                        <path
                            d="M35.8345 56.2812C38.4744 56.2812 40.6144 54.8519 40.6144 53.0887C40.6144 51.3256 38.4744 49.8962 35.8345 49.8962C33.1947 49.8962 31.0547 51.3256 31.0547 53.0887C31.0547 54.8519 33.1947 56.2812 35.8345 56.2812Z"
                            fill="white" />
                        <path
                            d="M37.9507 56.5163C37.2654 56.7188 36.5543 56.8209 35.8397 56.8195C32.8575 56.8195 30.5181 55.1853 30.5181 53.0937C30.5181 51.0022 32.8505 49.3621 35.8317 49.3589C37.1314 49.334 38.4102 49.6889 39.5112 50.3802C40.0056 50.6378 40.4201 51.026 40.7094 51.5026C40.9988 51.9791 41.1521 52.5259 41.1526 53.0834C41.1531 53.6409 41.0008 54.188 40.7123 54.6651C40.4237 55.1421 40.01 55.531 39.516 55.7895C39.0331 56.1079 38.5055 56.3528 37.9507 56.5163V56.5163ZM34.047 50.6899C32.6107 51.1199 31.5926 52.0482 31.5932 53.0911C31.5932 54.5301 33.5374 55.7444 35.8397 55.7422C36.9273 55.7651 37.998 55.4707 38.9209 54.8951C39.2671 54.7356 39.5603 54.4802 39.7656 54.1592C39.971 53.8382 40.08 53.465 40.0797 53.0838C40.0793 52.7027 39.9697 52.3297 39.7637 52.009C39.5578 51.6884 39.2642 51.4335 38.9177 51.2747C37.9941 50.7002 36.9229 50.4077 35.8354 50.4329C35.23 50.4313 34.6275 50.5179 34.047 50.6899V50.6899Z"
                            fill="#292A2E" />
                        <path d="M37.0069 56.1841L36.8941 49.9754L35.3502 49.9131L35.2422 56.2566L37.0069 56.1841Z"
                            fill="#292A2E" />
                        <path
                            d="M29.4935 54.4396C29.766 54.4396 29.9869 54.2186 29.9869 53.9461C29.9869 53.6736 29.766 53.4526 29.4935 53.4526C29.2209 53.4526 29 53.6736 29 53.9461C29 54.2186 29.2209 54.4396 29.4935 54.4396Z"
                            fill="#292A2E" />
                        <path
                            d="M29.8787 51.7992C30.1513 51.7992 30.3722 51.5783 30.3722 51.3057C30.3722 51.0332 30.1513 50.8123 29.8787 50.8123C29.6062 50.8123 29.3853 51.0332 29.3853 51.3057C29.3853 51.5783 29.6062 51.7992 29.8787 51.7992Z"
                            fill="#292A2E" />
                        <path
                            d="M189.551 71.3669C189.436 71.3669 189.324 71.33 189.232 71.2615C189.139 71.1931 189.071 71.0969 189.037 70.9869C187.254 64.3287 186.779 57.3881 187.636 50.5489C189.026 40.5506 194.54 27.4287 212.917 21.6829C215.503 20.8515 218.155 20.2435 220.845 19.8654C221.711 14.4572 225.005 8.59046 232.372 4.54276C249.875 -5.07496 261.699 3.55422 261.816 3.64238C261.93 3.72792 262.005 3.85526 262.025 3.99639C262.046 4.13753 262.009 4.28089 261.923 4.39494C261.838 4.50899 261.71 4.58439 261.569 4.60455C261.428 4.62472 261.285 4.58799 261.171 4.50245C261.059 4.41859 249.76 -3.78485 232.89 5.48562C226.006 9.26831 222.855 14.6975 221.959 19.7375C230.065 18.9392 233.946 21.6431 235.688 23.6852C236.766 24.9132 237.459 26.4313 237.68 28.0502C237.901 29.6692 237.641 31.3174 236.932 32.7896C236.372 33.9795 235.464 34.9715 234.328 35.6346C233.192 36.2976 231.882 36.6006 230.571 36.5035C226.044 36.2379 222.298 32.43 221.028 26.8019C220.609 24.8967 220.498 22.9368 220.698 20.9964C218.168 21.3599 215.673 21.9336 213.239 22.7117C198.916 27.19 190.662 36.6072 188.701 50.7C187.861 57.3839 188.324 64.1674 190.065 70.6751C190.09 70.7554 190.095 70.8405 190.081 70.9233C190.067 71.0062 190.033 71.0846 189.983 71.1522C189.933 71.2197 189.868 71.2747 189.793 71.3125C189.718 71.3504 189.635 71.3701 189.551 71.3701V71.3669ZM221.794 20.862C221.57 22.7654 221.666 24.6929 222.077 26.5648C223.238 31.7134 226.597 35.1929 230.633 35.43C231.734 35.5088 232.832 35.2533 233.784 34.6969C234.737 34.1405 235.499 33.3093 235.97 32.3122C236.585 31.0285 236.808 29.5923 236.612 28.1825C236.417 26.7728 235.81 25.4518 234.869 24.384C232.356 21.4345 227.769 20.2433 221.794 20.862V20.862Z"
                            fill="#292A2E" />
                        <path
                            d="M274.337 9.07523C273.613 9.07371 272.905 8.8675 272.293 8.48038C271.681 8.09327 271.191 7.54104 270.88 6.88743C270.568 6.23382 270.448 5.50547 270.533 4.78644C270.618 4.06742 270.904 3.38703 271.359 2.8238C271.814 2.26057 272.419 1.83746 273.104 1.6033C273.789 1.36914 274.526 1.33349 275.231 1.50044C275.935 1.6674 276.578 2.03016 277.085 2.54687C277.593 3.06357 277.943 3.71316 278.097 4.42064V4.42064C278.218 4.98148 278.211 5.56215 278.078 6.12016C277.945 6.67816 277.689 7.19937 277.329 7.64561C276.968 8.09185 276.513 8.45183 275.995 8.6992C275.477 8.94656 274.911 9.07504 274.337 9.07523V9.07523ZM274.345 2.47205C273.774 2.47204 273.216 2.64936 272.749 2.97957C272.283 3.30978 271.93 3.77663 271.739 4.31577C271.549 4.85492 271.531 5.43981 271.687 5.98984C271.843 6.53987 272.166 7.02796 272.611 7.38684C273.056 7.74572 273.601 7.95772 274.172 7.99362C274.743 8.02952 275.31 7.88755 275.797 7.58728C276.283 7.28702 276.665 6.84324 276.889 6.3171C277.112 5.79096 277.167 5.20838 277.046 4.64964C276.915 4.03145 276.575 3.47733 276.083 3.08068C275.591 2.68402 274.977 2.46907 274.345 2.47205V2.47205Z"
                            fill="#292A2E" />
                        <path
                            d="M272.719 17.8485C271.734 17.8484 270.786 17.4706 270.071 16.7929C269.356 16.1152 268.928 15.1891 268.875 14.2053C268.822 13.2215 269.148 12.2548 269.786 11.5043C270.425 10.7538 271.326 10.2766 272.306 10.1709C273.285 10.0652 274.268 10.3391 275.052 10.9361C275.836 11.5331 276.361 12.4079 276.519 13.3803C276.677 14.3528 276.457 15.3489 275.903 16.1635C275.348 16.9782 274.503 17.5495 273.541 17.7598C273.271 17.8187 272.995 17.8484 272.719 17.8485V17.8485ZM272.732 11.2447C272.533 11.2448 272.335 11.2663 272.141 11.3087C271.454 11.4595 270.851 11.8678 270.457 12.4494C270.062 13.0311 269.905 13.742 270.018 14.4358C270.132 15.1296 270.507 15.7536 271.066 16.1794C271.626 16.6051 272.327 16.8003 273.026 16.7246C273.725 16.649 274.368 16.3084 274.824 15.7729C275.279 15.2373 275.512 14.5476 275.474 13.8456C275.437 13.1436 275.131 12.4827 274.621 11.9989C274.111 11.5151 273.435 11.2452 272.732 11.2447V11.2447Z"
                            fill="#292A2E" />
                        <path
                            d="M278.492 10.6455C278.831 8.80947 276.877 6.90981 274.128 6.40255C271.379 5.89529 268.876 6.97251 268.537 8.80857C268.198 10.6446 270.152 12.5443 272.901 13.0515C275.65 13.5588 278.153 12.4816 278.492 10.6455Z"
                            fill="white" />
                        <path
                            d="M274.255 13.7153C273.768 13.7145 273.282 13.6695 272.803 13.5809C271.451 13.3566 270.194 12.7428 269.186 11.8146C268.745 11.4381 268.406 10.9564 268.2 10.4141C267.994 9.87179 267.928 9.28633 268.008 8.71185C268.138 8.14658 268.409 7.62322 268.795 7.19011C269.181 6.75699 269.669 6.42809 270.216 6.23378C271.495 5.75084 272.881 5.62668 274.225 5.87472C275.569 6.12276 276.82 6.73356 277.842 7.64107C278.283 8.01755 278.623 8.49921 278.829 9.04152C279.034 9.58383 279.1 10.1693 279.02 10.7438C278.89 11.309 278.619 11.8324 278.233 12.2655C277.848 12.6986 277.359 13.0275 276.812 13.2218C276.002 13.5573 275.132 13.7251 274.255 13.7153V13.7153ZM272.77 6.81433C272.04 6.80504 271.316 6.94346 270.641 7.22125C270.259 7.3491 269.915 7.57021 269.64 7.86456C269.365 8.1589 269.167 8.51719 269.066 8.90698C269.022 9.30737 269.078 9.71245 269.23 10.0855C269.382 10.4586 269.624 10.788 269.935 11.0437C270.805 11.8026 271.863 12.3136 272.997 12.5231C274.132 12.7326 275.303 12.6329 276.386 12.2344C276.768 12.1065 277.112 11.8854 277.387 11.5911C277.662 11.2967 277.859 10.9384 277.961 10.5486V10.5486C278.005 10.1482 277.949 9.74305 277.797 9.36991C277.645 8.99677 277.403 8.66747 277.091 8.41191C276.235 7.63127 275.171 7.11701 274.027 6.93205C273.613 6.85495 273.193 6.81555 272.772 6.81433H272.77Z"
                            fill="#292A2E" />
                        <path d="M272.893 6.27905L271.812 12.765L273.407 13.1284L274.745 6.54406L272.893 6.27905Z"
                            fill="#292A2E" />
                        <path
                            d="M279.374 13.2567C279.662 13.2567 279.896 13.0227 279.896 12.7342C279.896 12.4456 279.662 12.2117 279.374 12.2117C279.085 12.2117 278.851 12.4456 278.851 12.7342C278.851 13.0227 279.085 13.2567 279.374 13.2567Z"
                            fill="#292A2E" />
                        <path
                            d="M280.284 10.5821C280.573 10.5821 280.807 10.3482 280.807 10.0596C280.807 9.77104 280.573 9.53711 280.284 9.53711C279.996 9.53711 279.762 9.77104 279.762 10.0596C279.762 10.3482 279.996 10.5821 280.284 10.5821Z"
                            fill="#292A2E" />
                    </svg>

                    <h1 class="text-xl font-bold">
                        No Post yet
                    </h1>
                    <h1 class=" font-medium">
                        No post in this page yet, create one by click that pencil icon
                    </h1>
                </div>
            </div>
        </div>
    @endif
</div>
