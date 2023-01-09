<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 

        
        <div class="flex justify-between items-center">

            <div class="flex justify-start items-center">
                <?php if($user->avatar == null): ?>
                    <img src="<?php echo e(asset('img/user.png')); ?>" alt="" class=" object-cover rounded-full content_pict">
                <?php else: ?>
                    <img src="<?php echo e(asset('/storage/' . $user->avatar)); ?>" alt=""
                        class=" object-cover rounded-full content_pict">
                <?php endif; ?>

                <div class="mx-4">
                    <h1 class="font-semibold text-xl text-cyan-800 leading-tight">
                        <?php echo e($user->name); ?>

                    </h1>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        <?php echo e($user->username); ?>

                    </h3>
                    <h3 class="text-md text-cyan-800 leading-tight ">
                        <?php if($user->job_position == null && $user->work_place == null): ?>
                            <?php echo e('No Job'); ?>

                        <?php else: ?>
                            <?php echo e($user->job_position); ?> at <?php echo e($user->work_place); ?>

                        <?php endif; ?>
                    </h3>
                </div>
            </div>
            
        </div>

     <?php $__env->endSlot(); ?>

    <div class="flex justify-center mt-4">
        <div class="py-2">
            <?php echo $__env->make('layouts.myPostsNavgation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('profile.myPost', ['posts' => $posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        
        <div class="flex-col space-y-4 items-center mx-4 sm:mx-0 py-2">
            <div
                class="py-6 px-8 items-center rounded-lg shadow-lg overflow-hidden w-full sm:w-11/12 md:max-w-md hover:shadow-xl bg-white dark:bg-cyan-900">
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-md sm:text-xl font-bold text-gray-800 mr-2 dark:text-gray-100">
                        My Certificate</h1>
                </div>

                <div class='my-3 flex flex-wrap -m-1'>
                    
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
                    
                    <input type="file"
                        class="bottom-0 right-0 rounded-md w-full h-full focus:border-green-400 focus:ring-green-400 bg-emerald-100 shadow-md">
                </div>
            </div>
        </div>

        

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\applications\animalie\resources\views/profile/profile.blade.php ENDPATH**/ ?>