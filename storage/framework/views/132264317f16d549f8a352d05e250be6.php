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
            Invite User
        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-8 mt-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <?php if($errors->any()): ?>
                    <div class="mb-4 text-red-600">
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="mb-4 text-green-600">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('invite.store')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Enter email" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Role
                        </label>
                        <select name="role"
                            class="w-full border-gray-300 rounded-md shadow-sm">

                            <option value="Admin">Admin</option>
                            <?php if(!$authUser->hasRole('SuperAdmin')): ?>
                            <option value="Member">Member</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="mt-4 mb-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Invite User
                        </button>
                    </div>

                </form>


                <hr class="my-6">

                <h3 class="text-lg font-semibold mt-4">Invited Users</h3>

                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Role</th>
                            <th class="p-2 border">Company ID</th>
                            <th class="p-2 border">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="p-2 border text-center"><?php echo e($invite->email); ?></td>
                                <td class="p-2 border text-center"><?php echo e($invite->role); ?></td>
                                <td class="p-2 border text-center"><?php echo e($invite->company_id); ?></td>
                                <td class="p-2 border text-center"><?php echo e($invite->created_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center p-4">No invitations found</td>
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
<?php /**PATH D:\wamp64\www\sembark\resources\views/invite/create.blade.php ENDPATH**/ ?>