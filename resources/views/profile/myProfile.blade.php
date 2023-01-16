<x-app-layout>
    <x-slot name="header">

        {{-- Profile --}}
        <div class="flex justify-between items-center">

            <div class="flex justify-start items-center">
                @if (Auth::user()->avatar == null)
                    <img src="{{ asset('img/0profile.png') }}" alt=""
                        class=" object-cover rounded-full content_pict">
                @else
                    <img src="{{ asset('/storage/' . Auth::user()->avatar) }}" alt=""
                        class=" object-cover rounded-full content_pict">
                @endif

                <div class="mx-4">
                    <h1 class="font-semibold text-xl text-cyan-800 leading-tight">
                        {{ $user->name }}
                    </h1>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        {{ $user->username }}
                    </h3>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        @if ($user->job_position == null && $user->work_place == null)
                            {{ 'No Job' }}
                        @else
                            {{ $user->job_position }} at {{ $user->work_place }}
                        @endif
                    </h3>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}">
                <div class="rounded-full shadow-md bg-white p-4 text-cyan-900">
                    <i data-feather="edit"></i>
                </div>
            </a>
        </div>

    </x-slot>

    <div class="flex justify-center mt-0 md:mt-4 lg:mt-4">

        <div class=" md:py-2 lg:py-2">
            <div class="space-y-4 items-center p-4 bg-white border-b-2 visible lg:hidden">
                <h1 class="text-md sm:text-xl font-bold text-cyan-800 mr-2 dark:text-cyan-100">
                    My Certificate</h1>

                {{-- certificate img --}}
                <div class='my-3 flex flex-wrap -m-1'>
                    {{-- @foreach ($users as $user) --}}
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                </div>

                {{-- input certificate --}}
                <input type="file"
                    class="bottom-0 right-0 rounded-md w-full h-full focus:border-green-400 focus:ring-green-400 bg-emerald-100 shadow-md">
            </div>
            @include('layouts.myPostsNavgation')

            {{-- include mypost --}}
            @include('profile.myPost', ['posts' => $posts])

        </div>

        {{-- Certificate --}}
        <div class="flex-col space-y-4 items-center mx-4 sm:mx-0 py-2 hidden lg:block">
            <div
                class="py-6 px-8 items-center rounded-lg shadow-lg overflow-hidden w-full sm:w-11/12 md:max-w-md hover:shadow-xl bg-white dark:bg-cyan-900">
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-md sm:text-xl font-bold text-gray-800 mr-2 dark:text-gray-100">
                        My Certificate</h1>
                </div>

                <div class='my-3 flex flex-wrap -m-1'>
                    {{-- @foreach ($users as $user) --}}
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                    <span class="m-1 flex flex-wrap justify-between items-center text-xs  leading-loose cursor-pointer">
                        <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                            src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    </span>
                    {{-- @endforeach --}}
                    <input type="file"
                        class="bottom-0 right-0 rounded-md w-full h-full focus:border-green-400 focus:ring-green-400 bg-emerald-100 shadow-md">
                </div>
            </div>
        </div>

        {{-- <div class="py-2 w-3/12">
            <div class=" lg:px-8 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <h3 class="text-gray-900">My Certificate</h3>
                <div class="flex justify-between">
                    <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                        src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                        src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                    <img class="rounded-md aspect-square object-cover content_pict border-2 border-gray-200 my-2"
                        src="https://source.unsplash.com/1200x400/?printed-certificate" alt="certificate">
                </div>
                <input type="file"
                    class="bottom-0 right-0 rounded-md w-full h-full focus:border-green-400 focus:ring-green-400 bg-emerald-100 shadow-md">
            </div>
        </div> --}}

        @include('layouts.floatingButton')

</x-app-layout>
