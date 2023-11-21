

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo e(route('contratos.index')); ?>" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                <?php echo app('translator')->get('crud.contratos.show_title'); ?>
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.contratos.inputs.identificacao'); ?></h5>
                    <span><?php echo e($contrato->identificacao ?? '-'); ?></span>
                </div>
            </div>

            <div class="mt-4">
                <a href="<?php echo e(route('contratos.index')); ?>" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    <?php echo app('translator')->get('crud.common.back'); ?>
                </a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Contrato::class)): ?>
                <a href="<?php echo e(route('contratos.create')); ?>" class="btn btn-light">
                    <i class="icon ion-md-add"></i> <?php echo app('translator')->get('crud.common.create'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app/contratos/show.blade.php ENDPATH**/ ?>