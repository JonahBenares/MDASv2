<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class='flex justify-center mt-42'>
        <div id="hexagon-spinner" style="display:block">
            <div class="hexagon-loader"></div>
        </div>
    </div>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Prices & Schedule & Load <b>(AVERAGE)</b> </div>
            <div class="flex justify-center space-x-4 ">
                <span class="flex items-center text-sm font-medium text-gray-500 white:text-white">Legend:</span>
                <?php $__currentLoopData = $powerplant_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center text-sm font-medium text-gray-500 white:text-white"><span class="flex w-2.5 h-2.5 rounded-full mr-1 flex-shrink-0" style="background:<?php echo e($pt->legend); ?>"></span><?php echo e($pt->type_name); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <form method="POST" action="<?php echo e(route('filter_scheduleloadavg')); ?>" onSubmit="return selectValidation();">
            <?php echo csrf_field(); ?>
            <div class="flex justify-center pb-4  mt-4 space-x-2">
                <div class="flex ">
                    <span class="inline-flex items-center px-2 text-xs text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md white:bg-gray-600 white:text-gray-400 white:border-gray-600">
                    Interval
                    </span>
                    <select name='interval_from' id="interval_from" class="filter text-center w-22 rounded-none border-r-0 bg-gray-50 text-xs border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <?php for($x=1;$x<=24;$x++): ?>
                        <option value="<?php echo e($x); ?>"><?php echo e($x); ?></option>
                        <?php endfor; ?>
                    </select>
                    <select name='interval_to' id='interval_to' class="filter text-center w-22 rounded-none border-r-0 bg-gray-50 text-xs border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <?php for($x=1;$x<=24;$x++): ?>
                        <option value="<?php echo e($x); ?>"><?php echo e($x); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="w-60">
                    <input type="date" name='date' class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                </div>
                <div class="w-60">
                    <select name='grid' id='grid' class="filter block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <option value="">Select Grid</option>
                        <?php $__currentLoopData = $grid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($r->id); ?>"><?php echo e($r->grid_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="w-60">
                    <select name='resource_type' id='resource_type' type="text" class="filter block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <option value="">Select Resource Type</option>
                        <?php $__currentLoopData = $resource_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rt->id); ?>"><?php echo e($rt->resource_code); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="w-60">
                    <select name='resource_id' id='resource_id' type="text"  class="filter block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <option value="">Select Resource ID</option>
                        <?php $__currentLoopData = $powerplant_resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pr->id); ?>"><?php echo e($pr->resource_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="w-60">
                    <select name='powerplant_type' type="text" id="powerplant_type" class="filter block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <option value="">Select Power Plant Type</option>
                        <?php $__currentLoopData = $powerplant_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pt->id); ?>"><?php echo e($pt->type_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-xs px-5 py-2.5 mb-1  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                        <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                    </svg> 
                    Filter
                </button>
            </div>
        </form>
        <?php if(!empty($_POST)): ?>
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 mb-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                </svg>
                <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    <?php if(isset($_POST['interval_from']) && isset($_POST['interval_to'])): ?>
                    <span><b>Intervals:</b> <?php echo e($_POST['interval_from']." - ".$_POST['interval_to']); ?></span> 
                    <?php endif; ?>
                    
                    <?php if(isset($_POST['date']) && !empty($_POST['date'])): ?>
                    <span><b>Date:</b> <?php echo e($_POST['date']); ?></span>    
                    <?php endif; ?>

                    <?php if(isset($_POST['grid']) && !empty($_POST['grid'])): ?>
                    <span><b>Grid:</b> <?php echo e(getGridName($_POST['grid'])); ?></span>    
                    <?php endif; ?>

                    <?php if(isset($_POST['resource_type']) && !empty($_POST['resource_type'])): ?>
                    <span><b>Resource Type:</b> <?php echo e(getReosurcetype($_POST['resource_type'])); ?></span>    
                    <?php endif; ?>

                    <?php if(isset($_POST['resource_id']) && !empty($_POST['resource_id'])): ?>
                    <span><b>Resource ID:</b> <?php echo e(getReosurcename($_POST['resource_id'])); ?></span> 
                    <?php endif; ?>   
                    
                    <?php if(isset($_POST['powerplant_type']) && !empty($_POST['powerplant_type'])): ?>
                    <span><b>Power Plant Type:</b> <?php echo e(getTypename($_POST['powerplant_type'])); ?></span>    
                    <?php endif; ?>
                </div>
                <a  type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($_POST)): ?>
        <div class="relative overflow-x-auto h-96">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom" width="10%">Resource_ID</th>
                        <?php $__currentLoopData = $loadintervalArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ih): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <th scope="col" class="px-1 py-1 border" align="center"><?php echo e($ih->run_hour); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $loadArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="px-1 py-1 border align-bottom <?php echo e((!empty(getResourcecolor($sl->resource_name))) ? 'text-white' : ''); ?>" style="background:<?php echo e(getResourcecolor($sl->resource_name)); ?>"><?php echo e($sl->resource_name); ?></td>
                        <?php $__currentLoopData = $loadintervalArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ihsad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <td class="px-1 py-1 border" align="center"><?php echo e(number_format(getAvgSchedule($sl->resource_name,$ihsad->run_hour),1)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <script>
        window.addEventListener("load", () => { 
            document.getElementById("hexagon-spinner").style.display = "none"; 
        }); 
    </script>
  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
 <?php /**PATH C:\xampp\htdocs\mdasv2\resources\views/report_sched_average/index.blade.php ENDPATH**/ ?>