<x-app-layout>
    <x-slot name="header">

        {{-- Profile --}}
        <div class="flex justify-between items-center">

            <div class="flex justify-start items-center">
                {{-- TODO : Perbaiki agar gambar mengikuti img rounded full dan tidak gepeng --}}
                <img src="{{ asset('/storage/' . Auth::user()->avatar) }}" alt="" class="rounded-full object-cover content_pict">
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

    <div class="flex justify-center mt-4">
        <div class="py-2">
            @include('layouts.myPostsNavgation')

            {{-- inclede mypost --}}

        </div>

        {{-- Certificate --}}

        <div class="py-2 w-3/12">
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
        </div>

</x-app-layout>
