<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/x-icon" href="/img/icon.svg">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js', 'resources/js/feather.min.js', 'resources/js/feather.js', 'resources/js/flowbite.js', 'resources/js/iconify.min.js', 'resources/js/iconify-icon.min.js']); ?>

    <!-- ckEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <?php echo $__env->yieldPushContent('header'); ?>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-100">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
            <header class="bg-teal-100 shadow text-cyan-900">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>

    </div>

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

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH D:\applications\animalie\resources\views/layouts/app.blade.php ENDPATH**/ ?>