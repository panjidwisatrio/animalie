<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="/img/icon.svg">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/feather.min.js', 'resources/js/feather.js', 'resources/js/flowbite.js', 'resources/js/iconify.min.js', 'resources/js/iconify-icon.min.js', 'resources/js/navpost.js', 'resources/js/navcategories.js', 'resources/js/loadmore.js'])

    <!-- ckEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    @stack('header')

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-100 md:bg-slate-100 lg:bg-slate-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-teal-100 shadow-sm-light md:shadow-md lg:shadow-md text-cyan-900">
                <div class="max-w-7xl mx-auto py-4 lg:py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>

    <script>
        // Get the button
        let backToTopBtn = document.getElementById("btn-back-to-top");
        let createButton = document.getElementById("btn-create");
        let groupButton = document.getElementById("btn-interest-group");

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
                groupButton.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
                createButton.style.display = "none";
                groupButton.style.display = "none";
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
    @stack('script')

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
