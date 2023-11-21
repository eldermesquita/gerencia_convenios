

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo e(route('users.index')); ?>" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                <?php echo app('translator')->get('crud.users.show_title'); ?>
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.users.inputs.name'); ?></h5>
                    <span><?php echo e($user->name ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.users.inputs.email'); ?></h5>
                    <span><?php echo e($user->email ?? '-'); ?></span>
                </div>
            </div>

            <div class="mt-4">
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.roles.name'); ?></h5>
                    <div>
                        <?php $__empty_1 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="badge badge-primary"><?php echo e($role->name); ?></div>
                        <br />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> - <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    <?php echo app('translator')->get('crud.common.back'); ?>
                </a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\User::class)): ?>
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-light">
                    <i class="icon ion-md-add"></i> <?php echo app('translator')->get('crud.common.create'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app/users/show.blade.php ENDPATH**/ ?>