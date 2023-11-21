<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name',
    'label',
    'type' => 'text',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name',
    'label',
    'type' => 'text',
]); ?>
<?php foreach (array_filter(([
    'name',
    'label',
    'type' => 'text',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($label ?? null): ?>
    <?php echo $__env->make('components.inputs.partials.label', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<select
    id="<?php echo e($name); ?>"
    name="<?php echo e($name); ?>"
    <?php echo e(($required ?? false) ? 'required' : ''); ?>

    <?php echo e($attributes->merge(['class' => 'form-control'])); ?>

    autocomplete="off"
><?php echo e($slot); ?></select>

<?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <?php echo $__env->make('components.inputs.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/components/inputs/select.blade.php ENDPATH**/ ?>