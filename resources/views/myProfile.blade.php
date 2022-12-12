<x-app-layout>
    <x-slot name="header">

        {{-- Profile --}}
        <div class="flex justify-between items-center">

            <div class="flex justify-start items-center">
                <img src="img/0profile.png" alt="" class="rounded-full content_pict">
                <div class="mx-4">
                    <h1 class="font-semibold text-xl text-cyan-800 leading-tight">
                        Full Name
                    </h1>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        @fullName
                    </h3>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        Supervisor at Kandang Mulia Jaya
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

        <div class="py-2">
            <div class=" sm:px-6 lg:px-8 mb-4 py-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="text-gray-900">
                    <h3>My Certificate</h3>
                    <img class="content_pict object-cover mr-4 shadow"
                        src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                        alt="avatar">
                </div>
            </div>
        </div>

</x-app-layout>
