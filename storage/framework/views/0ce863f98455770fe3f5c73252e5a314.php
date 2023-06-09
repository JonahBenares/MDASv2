<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="p-4 ">
        <div class="pb-4 flex justify-between">
            <div class="text-lg  font-medium uppercase">Upload Prices & Schedule & Load</div>
            <div class="">
                <a href="<?php echo e(route('uploadschedules.index')); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload New</a>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400 " id="table-01">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            RUN_TIME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MKT_TYPE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TIME_INTERVAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            REGION_NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RESOURCE_NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RESOURCE_TYPE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SCHED_MW
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LMP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOSS_FACTOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LMP_SMP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LMP_LOSS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LMP_CONGESTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $scheduleload->chunk(300); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedchunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $schedchunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                                    <?php echo e($sl->run_time); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e($sl->mkt_type); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($sl->time_interval); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e($sl->region_name); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($sl->resource_name); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e($sl->resource_type); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->schedule_mw,4)); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->lmp,4)); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->loss_factor,4)); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->lmp_smp,4)); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->lmp_loss,4)); ?>

                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php echo e(number_format($sl->congestion,4)); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


    </div>
 
 
  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
 <?php /**PATH C:\xampp\htdocs\mdasv2\resources\views/upload_schedule/show.blade.php ENDPATH**/ ?>