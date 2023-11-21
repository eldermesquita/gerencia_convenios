

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo e(route('roles.index')); ?>" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                <?php echo app('translator')->get('crud.roles.edit_title'); ?>
            </h4>

            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form','data' => ['method' => 'PUT','action' => ''.e(route('roles.update', $role)).'','class' => 'mt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => 'PUT','action' => ''.e(route('roles.update', $role)).'','class' => 'mt-4']); ?>
                <?php echo $__env->make('app.roles.form-inputs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="mt-4">
                    <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        <?php echo app('translator')->get('crud.common.back'); ?>
                    </a>

                    <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-light">
                        <i class="icon ion-md-add text-primary"></i>
                        <?php echo app('translator')->get('crud.common.create'); ?>
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        <?php echo app('translator')->get('crud.common.update'); ?>
                    </button>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app/roles/edit.blade.php ENDPATH**/ ?>