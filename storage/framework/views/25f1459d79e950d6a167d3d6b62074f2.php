<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <div id="addType" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
        <div class="relative w-full h-full max-w-lg md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 ">
                    <h3 class="text-xl font-medium text-gray-900 white:text-white">
                        Add Power Plant Type
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="addType">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span> 
                    </button>
                </div>
                <form method="POST" action="<?php echo e(route('powerplanttype.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Modal body -->
                    <div class="px-6">
                        <input type="text" name="type_name" class="block text-sm w-full px-3 py-2 mt-2 mb-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Type">
                        <span class="">Color</span>
                        <input type="color" name="legend" class="block text-sm w-full h-10 p-1  text-gray-600  bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2">
                        <button type="submit" data-modal-hide="addType" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="updateType" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
        <div class="relative w-full h-full max-w-lg md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 ">
                    <h3 class="text-xl font-medium text-gray-900 white:text-white">
                        Update Power Plant Type
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="updateType">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span> 
                    </button>
                </div>
                <form action="<?php echo e(route('edit_type')); ?>" method='POST'>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <!-- Modal body -->
                    <div class="px-6">
                        <input type="text" name="type_name" id="type_name" class="block text-sm w-full px-3 py-2 mt-2 mb-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Type">
                        <span class="">Color</span>
                        <input type="color" name="legend" id='legend' class="block text-sm w-full h-10 p-1  text-gray-600  bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2">
                        <input type="hidden" id='id' name="id">
                        <button type="submit" data-modal-hide="updateType" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-3xl w-full white:bg-indigo-600 white:hover:bg-indigo-700 white:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addSub" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
        <div class="relative w-full h-full max-w-lg md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 ">
                    <h3 class="text-xl font-medium text-gray-900 white:text-white">
                        Add Sub Type
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="addSub">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span> 
                    </button>
                </div>
                <form method="POST" action="<?php echo e(route('insertSub')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Modal body -->
                    <div class="px-6">
                        <input type="text" name="subtype_name" class="block text-sm w-full px-3 py-2 mt-2 mb-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Sub Type">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2">
                        <input type="hidden" name='type_id' value="<?php echo e((isset($_GET['id'])) ? $_GET['id'] : ''); ?>">
                        <button type="submit" data-modal-hide="addSub" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="updateSub" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
        <div class="relative w-full h-full max-w-lg md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 ">
                    <h3 class="text-xl font-medium text-gray-900 white:text-white">
                        Update Sub Type
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="updateSub">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span> 
                    </button>
                </div>
                <form action="<?php echo e(route('updateSub')); ?>" method='POST'>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <!-- Modal body -->
                    <div class="px-6">
                        <input type="text" name="subtype_name" id="subtype_name" class="block text-sm w-full px-3 py-2 mt-2 mb-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Sub Type">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2">
                        <input type="hidden" id='subid' name='subid'>
                        <input type="hidden" id='type_id' name='type_id'>
                        <button type='submit' data-modal-hide="updateSub" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-3xl w-full white:bg-indigo-600 white:hover:bg-indigo-700 white:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div class="p-4 ">
        <div class="mb-4 pb-2 flex justify-between border-b">
            <div class="text-lg  font-medium uppercase py-2">Power Plant Type</div>
            <div class="">
            </div>
        </div>
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
        <div class="flex justify-center space-x-2 mb-4 pb-2 border-b">
            <span class="py-2 ">Type:</span>
            <div class="w-10/12  ">
                <div class="flex justify-start space-x-2 overflow-x-auto">
                    <?php $x=1; ?>
                    <?php $__currentLoopData = $powerplant_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex justify-center border border-gray-100 shadow-md rounded-lg mb-2 ">
                        <a href="<?php echo e(route('show', $pt->id)); ?>" class="text-gray-900 bg-white font-medium rounded-lg rounded-r-none text-sm text-center inline-flex items-center white:focus:ring-gray-800 white:bg-white white:border-gray-700 white:text-gray-900 white:hover:bg-gray-200">
                            <span style="background-color:<?php echo e($pt->legend); ?>" class="w-5 rounded-r-none rounded-lg px-4 py-2 mr-2"><br></span> <?php echo e($pt->type_name); ?>

                        </a>
                        <button href="" data-dropdown-toggle="dropdwon<?php echo e($x); ?>" class="w-auto text-gray-900 bg-white  font-medium rounded-lg rounded-l-none text-sm px-1 py-2 text-center inline-flex items-center white:focus:ring-gray-800 white:bg-white white:border-gray-700 white:text-gray-900 white:hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg>
                        </button>
                       
                        <div id="dropdwon<?php echo e($x); ?>" class="z-10 hidden font-normal bg-white  rounded-lg shadow w-auto white:bg-gray-700 white:divide-gray-600 mt-10">
                            <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                                  <li>
                                    <a data-modal-target="updateType" data-modal-toggle="updateType" data-id='<?php echo e($pt->id); ?>' data-type='<?php echo e($pt->type_name); ?>' data-color='<?php echo e($pt->legend); ?>' class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white editType">Update</a>
                                  </li>
                                <li>
                                    <a href="<?php echo e(route('destroyType',['id'=>$pt->id])); ?>" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php $x++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <button data-modal-target="addType" data-modal-toggle="addType" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800 mb-2.5" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>
        
        <div class="relative overflow-y-auto h-80 rounded-lg mb-5 shadow-md border border-2" style="border-color:<?php echo e($legend); ?>">
            <div class="flex justify-start">
                <div class="w-20 py-1" style="background-color:<?php echo e($legend); ?>"><br></div>
                <div class="px-2 py-1"><?php echo e($powerplanttype); ?></div>
            </div>
            <?php if(isset($_GET['id'])): ?>
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400 border-t " id="as-01">
                <thead class="text-xs text-gray-700 border-b bg-gray-50 white:bg-gray-700 white:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 uppercase">
                            Sub Type Name
                        </th>
                        <th scope="col" class="px-6 py-3" width="5%" align="center">
                            <a data-modal-target="addSub" data-modal-toggle="addSub" class=""> 
                                <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 white:bg-blue-600 white:hover:bg-blue-700 focus:outline-none white:focus:ring-blue-800 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                    </svg>
                                    Add
                                </div>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($subtype)): ?>
                        <?php $__currentLoopData = $subtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap white:text-white">
                                    <?php echo e($s->subtype_name); ?>

                                </td>
                                <td class="px-6 py-2 flex justify-center space-x-1">
                                    <a data-modal-target="updateSub" data-modal-toggle="updateSub" class="editSub" data-id='<?php echo e($s->id); ?>' data-type='<?php echo e($s->type_id); ?>' data-subtypename='<?php echo e($s->subtype_name); ?>'>
                                        <div class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-2xl text-sm px-2 py-2 white:bg-indigo-600 white:hover:bg-indigo-700 focus:outline-none white:focus:ring-indigo-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('destroy',['id'=>$s->id,'type_id'=>$s->type_id])); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
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
            <?php endif; ?>
        </div>
    </div>
    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
 <?php /**PATH C:\xampp\htdocs\mdasv2\resources\views/powerplant_type/index.blade.php ENDPATH**/ ?>