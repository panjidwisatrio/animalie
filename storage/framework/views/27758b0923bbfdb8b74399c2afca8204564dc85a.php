<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['disabled' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['disabled' => false]); ?>
<?php foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<input <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge([
    'class' => 'border-gray-300 focus:border-green-400 focus:ring-green-400 bg-emerald-100 rounded-md shadow-sm',
]); ?>>
<?php /**PATH D:\applications\animalie\resources\views/components/text-input.blade.php ENDPATH**/ ?>