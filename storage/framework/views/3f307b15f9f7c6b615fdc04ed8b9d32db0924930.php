
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
        <h2 class="font-semibold text-xl text-cyan-900 leading-tight">
            <?php echo e(__('Detail Post')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    
    
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 py-2">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg p-10">
            
            <div class="flex justify-between">
                <div class="flex">
                    <div>
                        <?php if($post->user->avatar == null): ?>
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="<?php echo e(asset('/img/0profile.png')); ?>" alt="avatar">
                        <?php else: ?>
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="<?php echo e(asset('/storage/' . $post->user->avatar)); ?>" alt="avatar">
                        <?php endif; ?>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-cyan-900"><?php echo e($post->user->name); ?></h2>
                        <small class="text-sm text-cyan-900"><?php echo e($post->user->username); ?></small>
                    </div>
                </div>
                <div class="">
                    <small
                        class="text-sm text-cyan-900"><?php echo e(\Carbon\Carbon::parse($post->created_at)->diffForHumans()); ?></small>
                </div>
            </div>

            
            <div class="mt-4 text-cyan-900 text-sm text-justify">
                <h1 class="text-2xl font-weight-bolder my-2"><?php echo e($post->title); ?></h1>
                <div class="p-4 bg-emerald-50 rounded-md text-md">
                    <?php echo $post->content; ?>

                </div>

                
                <div class="mt-4">
                    <?php if($post->tag()->get() != null): ?>
                        <?php $__currentLoopData = $post->tag()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('post.tag', $tag->slug)); ?>">
                                <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800"><?php echo e($tag->name_tag); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                
                <div class="flex justify-end">
                    <div class="flex items-center">
                        <?php if(Auth::check()): ?>
                            <button class="like-button flex items-center space-x-1" data-id="<?php echo e($post->id); ?>"
                                data-liked="<?php echo e($post->liked(auth()->user()->id) ? 'true' : 'false'); ?>">
                                <i id="icon-<?php echo e($post->id); ?>" class="iconify"
                                    data-icon="<?php echo e($post->liked(auth()->user()->id) ? 'ant-design:like-twotone' : 'ant-design:like-outlined'); ?>"
                                    style="color: #164e63;" data-width="24" data-height="24"></i>
                                <small id="like-count-<?php echo e($post->id); ?>" class="font-semibold">
                                    <?php echo e($post->likeCount); ?>

                                </small>
                            </button>
                        <?php else: ?>
                            <form method="POST" action="<?php echo e(route('like.post', $post->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button class="like-button flex items-center space-x-1">
                                    <i id="icon-<?php echo e($post->id); ?>" class="iconify"
                                        data-icon="ant-design:like-outlined" style="color: #164e63;" data-width="24"
                                        data-height="24"></i>
                                    <small id="like-count-<?php echo e($post->id); ?>" class="font-semibold">
                                        <?php echo e($post->likeCount); ?>

                                    </small>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- comment form -->
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4 rounded-md py-2">
        <form method="POST" action="" class="bg-white px-4 pt-2 border-gray-200 border-b-2 rounded-t-lg">
            <div class="flex flex-wrap mx-3 space-x-4">
                <h2 class="px-4 pt-2 pb-2 text-cyan-900 text-md">Add a new comment</h2>
                <div class="w-full md:w-full m-2">
                    <textarea
                        class="border-gray-300 focus:border-green-400 focus:ring-green-400 bg-emerald-50 rounded-md leading-normal resize-none w-full h-20 py-2 px-3 font-normal text-sm placeholder-gray-500 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment..' required></textarea>
                </div>
                <div class="w-full flex items-start md:w-full">
                    <div class="w-full flex justify-end m-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ml-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3']); ?>
                            <?php echo e(__('Send')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </form>

        
        <div class="bg-white p-12 space-y-4 text-cyan-900">
            
            <a href="<?php echo e(route('user.showSpecific', $post->user->username)); ?>" class="flex justify-between">
                <div class="flex">
                    <div>
                        <?php if($post->user->avatar == null): ?>
                            <img class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                                src="<?php echo e(asset('/img/0profile.png')); ?>" alt="avatar">
                        <?php else: ?>
                            <img class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                                src="<?php echo e(asset('/storage/' . $post->user->avatar)); ?>" alt="avatar">
                        <?php endif; ?>
                    </div>
                    <div>
                        <h2 class="text-md font-semibold"><?php echo e($post->user->name); ?> </h2>
                        <small class="text-sm"><?php echo e($post->user->username); ?></small>
                    </div>
                </div>
                <div class="">
                    <small class="text-xs"><?php echo e(\Carbon\Carbon::parse($post->created_at)->diffForHumans()); ?></small>
                </div>
            </a>

            
            <div class="ml-6 rounded-md ">
                <p class="text-ls">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nulla, nisi voluptate porro
                    consequuntur
                    molestiae? Aspernatur nisi temporibus labore quos minima odit quia esse commodi! Temporibus minus
                    perspiciatis et ea suscipit deserunt molestiae quod. Ratione iusto debitis odio dolorem, qui rerum
                    ullam
                    odit quam soluta reprehenderit explicabo quas enim iste dicta nostrum accusamus quod, vitae neque
                    quis
                    minima? Rem dolores odio labore illo aliquam nemo minus amet,
                </p>
            </div>

            
            <div class="flex justify-end">
                <div class="flex items-center">
                    <?php if(Auth::check()): ?>
                        <button class="like-button flex items-center space-x-1" data-id="<?php echo e($post->id); ?>"
                            data-liked="<?php echo e($post->liked(auth()->user()->id) ? 'true' : 'false'); ?>">
                            <i id="icon-<?php echo e($post->id); ?>" class="iconify"
                                data-icon="<?php echo e($post->liked(auth()->user()->id) ? 'ant-design:like-twotone' : 'ant-design:like-outlined'); ?>"
                                style="color: #164e63;" data-width="24" data-height="24"></i>
                            <small id="like-count-<?php echo e($post->id); ?>" class="font-semibold">
                                <?php echo e($post->likeCount); ?>

                            </small>
                        </button>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('like.post', $post->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="like-button flex items-center space-x-1">
                                <i id="icon-<?php echo e($post->id); ?>" class="iconify" data-icon="ant-design:like-outlined"
                                    style="color: #164e63;" data-width="24" data-height="24"></i>
                                <small id="like-count-<?php echo e($post->id); ?>" class="font-semibold">
                                    <?php echo e($post->likeCount); ?>

                                </small>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <?php $__env->startPush('script'); ?>
        
        <script type="text/javascript">
            const button = document.querySelectorAll('.like-button');

            button.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const likeCount = document.getElementById('like-count-' + id);

                    axios.post('/like-post/' + id).then(function(response) {
                        if (response.data.liked == true) {
                            document.getElementById("icon-" + id).dataset.icon =
                                "ant-design:like-twotone";
                            button.setAttribute('data-liked', 'true');
                        } else {
                            document.getElementById("icon-" + id).dataset.icon =
                                "ant-design:like-outlined";
                        }

                        button.setAttribute('data-liked', response.data.liked);

                        likeCount.innerHTML = response.data.likeCount;
                    }).catch(function(error) {
                        console.log(error.response.data);
                    });
                });
            })
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\applications\animalie\resources\views/post/detailpost.blade.php ENDPATH**/ ?>