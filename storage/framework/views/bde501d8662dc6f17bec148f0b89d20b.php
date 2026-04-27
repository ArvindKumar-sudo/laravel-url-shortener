<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            URLs
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8 mt-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                
                <?php if(!auth()->user()->hasRole('SuperAdmin')): ?>
                    <form method="POST" action="<?php echo e(route('urls.store')); ?>" class="flex gap-3 mb-6">
                        <?php echo csrf_field(); ?>

                        <input type="url" name="url"
                            class="flex-1 border-gray-300 rounded-md shadow-sm"
                            placeholder="Enter URL" required>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Create
                        </button>
                    </form>
                <?php endif; ?>

                <hr class="my-6">

                <h3 class="text-lg font-semibold mt-4">URL List</h3>

                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">S.NO.</th>
                            <th class="p-2 border">Company Name</th>
                            <th class="p-2 border">Original URL</th>
                            <th class="p-2 border">Short Code</th>
                            <th class="p-2 border">Hits</th>
                            <th class="p-2 border">Date</th>
                            <th class="p-2 border">Create By</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="p-2 border text-center"> <?php echo e($key+1); ?></td>
                                <td class="p-2 border text-center"> <?php echo e($url->company->name); ?></td>
                                <td class="p-2 border text-center">
                                    <a href="<?php echo e($url->original_url); ?>" target="_blank"> <?php echo e($url->original_url); ?> </a>
                                </td>
                                <td class="p-2 border text-center">
                                    <a href="<?php echo e(url('/short/'.$url->short_code)); ?>" class="text-indigo-600 hover:underline"> <?php echo e($url->short_code); ?> </a>
                                </td>
                                <td class="p-2 border text-center"><?php echo e($url->hits); ?></td>
                                <td class="p-2 border text-center"><?php echo e($url->created_at); ?></td>
                                <td class="p-2 border text-center"> <?php echo e($url->user->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center p-4">No URL found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\wamp64\www\sembark\resources\views/urls/index.blade.php ENDPATH**/ ?>