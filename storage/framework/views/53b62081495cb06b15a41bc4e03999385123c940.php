<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex justify-center mt-6">
        
        <div class="py-2">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                    <a href="<?php echo e(route('post.create')); ?>" class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-cyan-900 leading-tight ml-2">
                            <?php echo e(__('Create New Post')); ?>

                        </h2>
                        <button class="rounded-full bg-cyan-900 p-2 text-white">
                            <i data-feather="edit-3"></i>
                        </button>
                    </a>
                </div>
            </div>

            <?php echo $__env->make('layouts.postsNavgation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('post.posts', ['posts' => $posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('layouts.floatingButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        
        <div class="py-2">
            <?php echo $__env->make('layouts.tags', ['tags' => $tags], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\applications\animalie\resources\views/dashboard.blade.php ENDPATH**/ ?>