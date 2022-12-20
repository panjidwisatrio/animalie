<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

    {{-- Iconify --}}
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    @stack('header')

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-200">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-teal-100 shadow text-cyan-900">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <div class="">
            <!-- Create button -->
            <button type="button" onclick="window.location.href='/post/create';" data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="fixed d-none inline-block my-20 first-letter:mx-7 p-5 bg-cyan-900 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-cyan-900 hover:shadow-lg focus:bg-cyan-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cyan-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5"
                id="btn-create">
                <i data-feather="edit-3"></i>
            </button>

            <!-- Back to top button -->
            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                class="fixed d-none inline-blockmx-7 p-5 bg-cyan-900 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-cyan-900 hover:shadow-lg focus:bg-cyan-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cyan-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5"
                id="btn-back-to-top">
                <i data-feather="arrow-up"></i>
            </button>
        </div>
    </div>

    <!-- feather -->
    <script>
        feather.replace()
    </script>
    {{-- <script src="https://unpkg.com/feather-icons"></script> --}}
    <script src="js/feather.min.js"></script>

    <!-- ckEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <script>
        // Get the button
        let backToTopBtn = document.getElementById("btn-back-to-top");
        let createButton = document.getElementById("btn-create");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                backToTopBtn.style.display = "block";
                createButton.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
                createButton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        backToTopBtn.addEventListener("click", backToTop);
        createButton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    @yield('scripts')

    {{-- Flowbite --}}
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
</body>

</html>
