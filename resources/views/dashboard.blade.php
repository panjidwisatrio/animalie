<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <!-- Back to top button -->
    <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
        class="mx-7 fixed d-none inline-block p-6 bg-cyan-900 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-cyan-900 hover:shadow-lg focus:bg-cyan-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cyan-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5"
        id="btn-back-to-top">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-4" role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
                d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
            </path>
        </svg>
    </button>

    <div class="flex justify-center mt-4">
        {{-- Content --}}
        <div class="py-2">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                    <a href="{{ route('post.create') }}" class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-2">
                            {{ __('Create New Post') }}
                        </h2>
                        <button class="rounded-full bg-cyan-900 p-2 text-white">
                            <i data-feather="edit-3"></i>
                        </button>
                    </a>
                </div>
            </div>

            @include('layouts.postsNavgation')

            @include('post.posts')

        </div>

        {{-- Tags --}}
        <div class="py-2">
            @include('layouts.tags', ['tags' => $tags])
        </div>
    </div>

    @push('scripts')
        <script>
            // Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    @endpush
</x-app-layout>
