<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['active']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['active']); ?>
<?php foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $classes = $active ?? false ? 'rounded-full inline-flex items-center px-4 text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700  hover:bg-white bg-white font-semibold' : 'rounded-full px-5 inline-flex items-center px-4 text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700  hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH D:\applications\animalie\resources\views/components/nav-link-btn.blade.php ENDPATH**/ ?>