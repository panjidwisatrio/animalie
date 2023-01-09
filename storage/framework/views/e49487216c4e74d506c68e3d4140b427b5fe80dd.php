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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Detail Post')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 ">
        <div class="bg-white overflow-hidden shadow-sm rounded-md p-10">
            
            <div class="flex justify-between">
                <div class="">
                    <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                        src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                        alt="avatar">
                    <h2 class="text-lg font-semibold text-gray-9001">Brad Adams </h2>
                    <small class="text-sm text-gray-700">@brad_dd</small>
                </div>
                <div class="">
                    <small class="text-sm text-gray-700">22h ago</small>
                </div>
            </div>

            
            <div class="">
                <p class="mt-3 text-gray-700 text-sm text-justify">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam dolorum assumenda
                    perferendis
                    aliquid tenetur architecto at, fuga sed culpa repellat repudiandae eum voluptas maiores
                    neque
                    sint eaque enim nobis quisquam autem vero sunt nisi reprehenderit! Voluptas quia ab aliquid
                    assumenda tempora delectus, laboriosam quibusdam, eos dolorem corrupti dolorum quidem
                    laudantium
                    obcaecati esse blanditiis ad. Libero ut voluptatibus ullam necessitatibus reiciendis fugit
                    non
                    minus possimus nam provident quaerat accusantium sit architecto dignissimos molestias
                    laboriosam
                    optio accusamus atque nulla quas laborum officiis, sunt expedita. Magnam tempora,
                    repellendus
                    provident quibusdam dolorum cumque distinctio aperiam ad ullam? Quo ducimus aspernatur
                    dignissimos enim modi, iste, pariatur minus consequatur vel delectus, quod reiciendis nulla
                    cupiditate exercitationem eius at? Mollitia ullam exercitationem necessitatibus, nostrum
                    dolores
                    officiis ipsam.
                </p>

                
                <div class="flex justify-start">
                    <img src="https://source.unsplash.com/1200x400/?livestock"
                        class="max-w-xs h-1/3 rounded-md mr-2 aspect-square object-cover" alt="livestock">

                </div>

                
                <div class="mt-4">
                    <span id="badge-dismiss-default"
                        class="inline-flex items-center py-1 px-2 mr-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-200 dark:text-blue-800">
                        Default
                        <button type="button"
                            class="inline-flex items-center p-0.5 ml-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-300 dark:hover:text-blue-900"
                            data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                            <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>
                </div>

                
                <div class="mt-4 flex justify-between">
                    <div class="flex mr-2 text-gray-700 text-sm mr-3">
                        <i data-feather="bookmark"></i>
                        <span>12</span>
                    </div>
                    <div class="inline">
                        <div class="inline-flex mr-2 text-gray-700 text-sm mr-3">
                            <i data-feather="message-square"></i>
                            <span>12</span>
                        </div>
                        <div class="inline-flex mr-2 text-gray-700 text-sm mr-3">
                            <i data-feather="thumbs-up"></i>
                            <span>12</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- comment form -->
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 rounded-md">
        <form class="bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                        class="bg-white rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                    </div>
                    <div class="mt-4 -mr-1">
                        <input type='submit'
                            class="bg-lime-300 text-green-700 font-medium py-1 px-4 rounded-lg tracking-wide mr-1"
                            value='Post Comment'>
                    </div>
                </div>
        </form>
    </div>
    </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\applications\animalie\resources\views/detailPost.blade.php ENDPATH**/ ?>