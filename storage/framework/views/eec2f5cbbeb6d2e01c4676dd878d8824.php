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
        <div class="mb-4 pb-2 flex justify-between border-b">
            <div class="text-lg  font-medium uppercase py-2">Power Plant</div>
            <div class="">
                <a href="<?php echo e(route('powerplant.create')); ?>" class=""> 
                    <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                        Add
                    </div>
                </a>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <?php if(Session::has('success')): ?>
                <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo e(Session::get('success')); ?></span>
                </div>
            <?php endif; ?>
            <?php if(Session::has('fail')): ?>
                <div class="mb-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo e(Session::get('fail')); ?></span>
                </div>
            <?php endif; ?>
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400 " id="table-01">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Resource ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Facility Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sub Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Capacity Installed
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Capacity Dependable
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. of Units
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location/Municipality
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Operator
                        </th>
                        <th scope="col" class="px-6 py-3" width="5%" align="center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                            </svg>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($powerplant)): ?>
                        <?php $__currentLoopData = $powerplant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                                <?php echo e(getReosurceid($p->id)); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->facility_name); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e(getTypename($p->pp_type_id)); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e(getSubtypename($p->subtype_id)); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->capacity_installed); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->capacity_dependable); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->number_of_units); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->municipality); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($p->operator); ?>

                            </td>
                            <td class="px-6 py-4 flex justify-center space-x-1">
                                <a href="<?php echo e(route('powerplant.edit',$p->id)); ?>" class="">
                                    <div class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-2xl text-sm px-2 py-2 white:bg-indigo-600 white:hover:bg-indigo-700 focus:outline-none white:focus:ring-indigo-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                        </svg>
                                        
                                    </div>
                                </a>
                                <a href="<?php echo e(route('destroyPoweplant',['id'=>$p->id])); ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                    <div class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-2xl text-sm px-2 py-2 white:bg-red-600 white:hover:bg-red-700 focus:outline-none white:focus:ring-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
 <?php /**PATH C:\xampp\htdocs\MDASv2\resources\views/power_plant/index.blade.php ENDPATH**/ ?>