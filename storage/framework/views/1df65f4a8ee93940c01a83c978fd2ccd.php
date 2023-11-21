

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo e(route('convenios.index')); ?>" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                <?php echo app('translator')->get('crud.convenios.show_title'); ?>
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.numero'); ?></h5>
                    <span><?php echo e($convenio->numero ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.numero_processo_sei'); ?></h5>
                    <span><?php echo e($convenio->numero_processo_sei ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.virgencia'); ?></h5>
                    <span><?php echo e($convenio->virgencia ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.contrato_id'); ?></h5>
                    <span
                        ><?php echo e(optional($convenio->contrato)->identificacao ?? '-'); ?></span
                    >
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.valor_repasse'); ?></h5>
                    <span><?php echo e($convenio->valor_repasse ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.valor_contra_partida'); ?></h5>
                    <span><?php echo e($convenio->valor_contra_partida ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.valor_total'); ?></h5>
                    <span><?php echo e($convenio->valor_total ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5>
                        <?php echo app('translator')->get('crud.convenios.inputs.valor_liberado_concedente'); ?>
                    </h5>
                    <span
                        ><?php echo e($convenio->valor_liberado_concedente ?? '-'); ?></span
                    >
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.valor_pago'); ?></h5>
                    <span><?php echo e($convenio->valor_pago ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.valor_liberado'); ?></h5>
                    <span><?php echo e($convenio->valor_liberado ?? '-'); ?></span>
                </div>
                <div class="mb-4">
                    <h5><?php echo app('translator')->get('crud.convenios.inputs.objeto'); ?></h5>
                    <span><?php echo e($convenio->objeto ?? '-'); ?></span>
                </div>
            </div>

            <div class="mt-4">
                <a href="<?php echo e(route('convenios.index')); ?>" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    <?php echo app('translator')->get('crud.common.back'); ?>
                </a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Convenio::class)): ?>
                <a href="<?php echo e(route('convenios.create')); ?>" class="btn btn-light">
                    <i class="icon ion-md-add"></i> <?php echo app('translator')->get('crud.common.create'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app/convenios/show.blade.php ENDPATH**/ ?>