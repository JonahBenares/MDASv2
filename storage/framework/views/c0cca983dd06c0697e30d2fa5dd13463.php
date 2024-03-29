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
    <div id="addOutage" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
        <div class="relative w-full h-full max-w-lg md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow white:bg-gray-700 mt-20">
                <!-- Modal header -->
                <div class="flex items-center justify-between px-5 py-3  border-b">
                    <h3 class="text-xl font-medium text-gray-900 white:text-white">
                        Add Outage
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="addOutage">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span> 
                    </button>
                </div>
                <form method="POST" action="<?php echo e(route('insertNewOutage')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Modal body -->
                    <div class="px-6 py-3">
                        <div class="mb-2">
                            <label class="py-1 text-sm">Grid</label>
                            <select type="text" name="grid" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" onchange='OutagesAdd()'> 
                            <option value="">Select Grid</option>
                            <?php $__currentLoopData = $grid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($g->id."-".$g->grid_code); ?>"><?php echo e($g->grid_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Date</label>
                            <input type="date" name="outage_date" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="flex justify-between space-x-2 mb-2">
                            <div class="w-full">
                                <label class="py-1 text-sm">Interval Start</label>
                                <div class="flex justify-between space-x-2">
                                    <div class="w-full">
                                    <select name="interval_start_hr" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                    <?php for($sh=10; $sh<=23; $sh++): ?>
                                        <option value="<?php echo e($sh); ?>"><?php echo e($sh); ?></option>
                                    <?php endfor; ?>
                                    </select>
                                        <!-- <input type="text" name="interval_start_hr" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > -->
                                    </div>   
                                    <span class="mt-2">:</span>
                                    <div class="w-full">
                                    <select name="interval_start_min" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                    <?php for($sm=10; $sm<=55; $sm = $sm + 5): ?>
                                        <option value="<?php echo e($sm); ?>"><?php echo e($sm); ?></option>
                                    <?php endfor; ?>
                                    </select>
                                        <!-- <input type="text" name="interval_start_min" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > -->
                                    </div> 
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="py-1 text-sm">Interval End</label>
                                <div class="flex justify-between space-x-2">
                                    <div class="w-full">
                                    <select name="interval_end_hr" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                    <?php for($eh=10; $eh<=23; $eh++): ?>
                                        <option value="<?php echo e($eh); ?>"><?php echo e($eh); ?></option>
                                    <?php endfor; ?>
                                    </select>
                                        <!-- <input type="text" name="interval_end_hr" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > -->
                                    </div>   
                                    <span class="mt-2">:</span>
                                    <div class="w-full">
                                    <select name="interval_end_min" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                    <?php for($em=10; $em<=55; $em = $em + 5): ?>
                                        <option value="<?php echo e($em); ?>"><?php echo e($em); ?></option>
                                    <?php endfor; ?>
                                    </select>
                                        <!-- <input type="text" name="interval_end_min" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > -->
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Resource ID</label>
                            <select type="text" name="resource_id" id="resourceid-dropdown" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" onchange='OutagesAdd()'> 
                            <option value="">Select Resource ID</option>
                            <?php $__currentLoopData = $powerplant_resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pr->id."-".$pr->resource_id."-".$pr->powerplant_id); ?>"><?php echo e($pr->resource_id); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Capacity</label>
                            <input type="text" name="capacity" id="capacity" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Power Plant type</label>
                            <input type="text" name="type_name" id="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Outage Type</label>
                            <select name="outage_type" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                                <option value="">Select Outages Type</option>
                                <option value="1">Planned</option>
                                <option value="2">Unplanned</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Remarks</label>
                            <textarea name="remarks" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="added_by" id='added_by' value="<?php echo e(Auth::id()); ?>">
                    <!-- Modal footer -->
                    <div class="flex items-center px-5 py-3 border-t">
                        <button type="submit" data-modal-hide="addType" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="p-4 ">
        
    <form method="POST" action="<?php echo e(route('filter_actualoutagesload')); ?>" onSubmit="return selectValidationOutages();">
            <?php echo csrf_field(); ?>
        <div class="pb-2 flex justify-between border-b ">
        <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Actual Outages</b> </div>
        <div class="flex justify-end">
            <div class="flex justify-center space-x-2 border-r pr-2">
                <div class="w-40">
                    <input type="date" name='date' id='date' class="filter_outages block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                </div>
                <div class="w-40">
                <select name='grid' id='grid' class="filter_outages block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Grid</option>
                    <?php $__currentLoopData = $grid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($r->id); ?>"><?php echo e($r->grid_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
                <div class="w-44">
                    <select name='resource_id' id='resource_id' type="text"  class="filter block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                        <option value="">Select Resource ID</option>
                        <?php $__currentLoopData = $powerplant_resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pr->id); ?>"><?php echo e($pr->resource_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit"  id='btn_filter' class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2 mb-1 pt-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                        <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                    </svg> 
                    Filter
                </button>
            </div>
    </form>
                <div class="flex justify-center space-x-2 pl-2">
                    <button data-modal-target="addOutage" data-modal-toggle="addOutage" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2 mb-1 pt-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-between space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>
                        Add
                    </button>
                </div>
            </div>
        </div>
        <!-- <?php
            $start=strtotime('1:00');
            $end=strtotime('02:00');

            for ($i=$start;$i<=$end;$i = $i + 5*60)
            {
                echo date('H:i A',$i).'<br>';
            }
        ?> -->
        <?php if(!empty($_POST)): ?>
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                  </svg>
                  
                  <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    <?php if(isset($_POST['date']) && !empty($_POST['date'])): ?>
                    <span><b>Date:</b> <?php echo e($_POST['date']); ?></span>    
                    <?php endif; ?>

                    <?php if(isset($_POST['grid']) && !empty($_POST['grid'])): ?>
                    <span><b>Grid:</b> <?php echo e(getGridName($_POST['grid'])); ?></span>    
                    <?php endif; ?>
                    
                    <?php if(isset($_POST['resource_id']) && !empty($_POST['resource_id'])): ?>
                    <span><b>Resource ID:</b> <?php echo e(getReosurcename($_POST['resource_id'])); ?></span> 
                    <?php endif; ?>      
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($_POST)): ?>
        <div class="relative overflow-x-auto h-100 mt-4">
            <table class="w-full text-xs text-left text-gray-500 white:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 white:bg-gray-700 white:text-gray-400 sticky top-0 ">
                    <tr>
                        <th scope="col" class="px-1 py-1 border" align="center" width="5%">Date</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="5%">Interval</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="10%">Type</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="10%">Resource ID</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="5%">Capacity</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="10%">Outage Type</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="20%">Remarks</th>
                        <th scope="col" class="px-1 py-1 border" align="center" width="10%">Total Capacity on Outage</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0; $previousdate = ''; $x=1; ?>
                <?php $__currentLoopData = $loadArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $date= date('F-d', strtotime("$sl->time_interval"));
                $outage_date= date('Y-m-d', strtotime("$sl->time_interval"));
                $time= date('H:i', strtotime("$sl->time_interval"));
                ?>
                    <tr class="<?php echo e(($previousdate !== '' && $previousdate !== $date ) ? 'border-t-2 border-red-500' : ''); ?>">
                        <td class="border" align="center">
                            <input type="hidden" name="outages_id[]" id='outages_id<?php echo e($x); ?>' value="<?php echo e($sl->id); ?>">
                            <input type="hidden" name="resource_name[]" id='resource_name<?php echo e($x); ?>' value="<?php echo e($sl->resource_name); ?>">
                            <input type="hidden" name="region_name[]" id='region_name<?php echo e($x); ?>' value="<?php echo e($sl->region_name); ?>">
                            <input type="hidden" name="outage_date[]" id='outage_date<?php echo e($x); ?>' value="<?php echo e($outage_date); ?>">
                            <?php echo e($date); ?>

                        </td>
                        <td class="border" align="center"><?php echo e(getMaxOutage($sl->time_interval,$sl->resource_name,$sl->pp_type_id)); ?></td>
                        <td class="border" align="center"><?php echo e(($sl->pp_type_id!=0) ? getTypename($sl->pp_type_id) : ''); ?></td>
                        <td class="border" align="center"><?php echo e($sl->resource_name); ?></td>
                        <td class="border" align="center"><?php echo e(number_format(getCapacity($sl->time_interval,$sl->resource_name,$sl->pp_type_id,$sl->resource_type),2)); ?></td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0" name="outages_type[]" id="outages_type<?php echo e($x); ?>" onchange="OutagesUpdate(<?php echo e($x); ?>)">
                                <option value="">Select Outages Type</option>
                                <option value="1" <?php echo e($sl->outages_type == "1"  ? 'selected' : ''); ?>>Planned</option>
                                <option value="2" <?php echo e($sl->outages_type == "2"  ? 'selected' : ''); ?>>Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="remarks[]" id="remarks<?php echo e($x); ?>" onblur="OutagesUpdate(<?php echo e($x); ?>)"><?php echo e($sl->remarks); ?></textarea>
                        </td>
                        <td class="border" align="center"><?php echo e(($previousdate !== $date ) ? number_format(getTotalCapacity($sl->time_interval,$sl->resource_type,$sl->region_name),2) : ''); ?></td>
                    </tr>
                    <?php $x++; $previousdate = $date; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <tr class="bg-white border-b-2 border-red-500 white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                    </tr> --> 
                </tbody>
            </table>
        </div>
        <!-- <div class="w-full fixed bottom-0 px-5 pb-2 flex justify-center left-0">
            <button data-modal-target="addOutage" data-modal-toggle="addOutage" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2 mb-1 pt-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                Save
            </button>
        </div> -->
        <?php else: ?>
            <center>No available data.</center>
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
 <?php /**PATH C:\xampp\htdocs\MDASv2\resources\views/report_actual_outages/index.blade.php ENDPATH**/ ?>