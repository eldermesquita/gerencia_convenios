

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title"><?php echo app('translator')->get('crud.convenios.index_title'); ?></h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="<?php echo e(__('crud.common.search')); ?>"
                                    value="<?php echo e($search ?? ''); ?>"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Convenio::class)): ?>
                        <a
                            href="<?php echo e(route('convenios.create')); ?>"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            <?php echo app('translator')->get('crud.common.create'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                <?php echo app('translator')->get('crud.convenios.inputs.numero'); ?>
                            </th>
                            <th class="text-left">
                                <?php echo app('translator')->get('crud.convenios.inputs.numero_processo_sei'); ?>
                            </th>
                            <th class="text-left">
                                <?php echo app('translator')->get('crud.convenios.inputs.virgencia'); ?>
                            </th>
                            <th class="text-left">
                                <?php echo app('translator')->get('crud.convenios.inputs.contrato_id'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_repasse'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_contra_partida'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_total'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_liberado_concedente'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_pago'); ?>
                            </th>
                            <th class="text-right">
                                <?php echo app('translator')->get('crud.convenios.inputs.valor_liberado'); ?>
                            </th>
                            <th class="text-left">
                                <?php echo app('translator')->get('crud.convenios.inputs.objeto'); ?>
                            </th>
                            <th class="text-center">
                                <?php echo app('translator')->get('crud.common.actions'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($convenio->numero ?? '-'); ?></td>
                            <td><?php echo e($convenio->numero_processo_sei ?? '-'); ?></td>
                            <td><?php echo e($convenio->virgencia ?? '-'); ?></td>
                            <td>
                                <?php echo e(optional($convenio->contrato)->identificacao
                                ?? '-'); ?>

                            </td>
                            <td><?php echo e($convenio->valor_repasse ?? '-'); ?></td>
                            <td>
                                <?php echo e($convenio->valor_contra_partida ?? '-'); ?>

                            </td>
                            <td><?php echo e($convenio->valor_total ?? '-'); ?></td>
                            <td>
                                <?php echo e($convenio->valor_liberado_concedente ?? '-'); ?>

                            </td>
                            <td><?php echo e($convenio->valor_pago ?? '-'); ?></td>
                            <td><?php echo e($convenio->valor_liberado ?? '-'); ?></td>
                            <td><?php echo e($convenio->objeto ?? '-'); ?></td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $convenio)): ?>
                                    <a
                                        href="<?php echo e(route('convenios.edit', $convenio)); ?>"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $convenio)): ?>
                                    <a
                                        href="<?php echo e(route('convenios.show', $convenio)); ?>"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $convenio)): ?>
                                    <form
                                        action="<?php echo e(route('convenios.destroy', $convenio)); ?>"
                                        method="POST"
                                        onsubmit="return confirm('<?php echo e(__('crud.common.are_you_sure')); ?>')"
                                    >
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="12">
                                <?php echo app('translator')->get('crud.common.no_items_found'); ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12"><?php echo $convenios->render(); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app/convenios/index.blade.php ENDPATH**/ ?>