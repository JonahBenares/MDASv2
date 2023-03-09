<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="p-4">
        <div class="rounded-lg white:border-gray-700">
           <div class="grid grid-cols-3 gap-4 mb-4">
              <div class="flex items-center justify-center h-24 rounded bg-gray-50 shadow-sm white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center h-24 rounded bg-gray-50 shadow-sm white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center h-24 rounded bg-gray-50 shadow-sm white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
           </div>
           <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 shadow-sm white:bg-gray-800">
              <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
           </div>
           <div class="grid grid-cols-2 gap-4 mb-4">
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
           </div>
           <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 shadow-sm white:bg-gray-800">
              <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
           </div>
           <div class="grid grid-cols-2 gap-4">
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
              <div class="flex items-center justify-center rounded bg-gray-50 shadow-sm h-28 white:bg-gray-800">
                 <p class="text-2xl text-gray-400 white:text-gray-500">+</p>
              </div>
           </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\MDASv2\resources\views/dashboard.blade.php ENDPATH**/ ?>