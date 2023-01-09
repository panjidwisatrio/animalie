<div class="flex-col space-y-4 items-center mx-4 sm:mx-0">
    <div
        class="py-6 px-8 items-center rounded-lg shadow-lg overflow-hidden w-full sm:w-11/12 md:max-w-md hover:shadow-xl bg-white dark:bg-cyan-900">
        <div class="flex flex-row justify-start items-center">
            <h1 class="text-md sm:text-xl font-bold text-gray-800 mr-2 dark:text-gray-100">Popular Tags</h1>
        </div>

        <div class='my-3 flex flex-wrap -m-1'>
            <?php if($tags->count()): ?>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('post.tag', $tag->slug)); ?>">
                        <span
                            class="m-1 flex flex-wrap justify-between items-center text-xs sm:text-sm bg-<?php echo e($tag->color); ?>-100  text-<?php echo e($tag->color); ?>-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-<?php echo e($tag->color); ?>-100 dark:text-<?php echo e($tag->color); ?>-800 rounded-md py-1 px-2 font-semibold leading-loose cursor-pointer dark:text-<?php echo e($tag->color); ?>-100">
                            <?php echo e($tag->name_tag); ?>

                        </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-center px-14 text-cyan-900">
                    <h1 class="text-md font-bold">
                        Oops no tag here!!
                    </h1>
                    <h1 class="text-sm font-medium">
                        No tags have been created yet
                    </h1>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
<?php /**PATH D:\applications\animalie\resources\views/layouts/tags.blade.php ENDPATH**/ ?>