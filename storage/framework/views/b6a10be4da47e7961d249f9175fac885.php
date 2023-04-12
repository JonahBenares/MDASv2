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
                  Add New Powerplant
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-600 white:hover:text-white" data-modal-hide="addType">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span> 
               </button>
            </div>
            <form method="POST">
               <!-- Modal body -->
               <div class="px-6">
                  <input type="text" name="operator" id='operators' class="block text-sm w-full px-3 py-2 mt-2 mb-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Facility Name">
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2">
                  <button type="button" data-modal-hide="addType" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" onclick='addPowerplant()'>Add</button>
               </div>
            </form>
      </div>
   </div>
</div>
<div id="checkUser" tabindex="-1"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-[#000000b8] ">
   <div class="relative w-full h-full max-w-lg md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 ">
               <h3 class="text-xl font-medium text-gray-900 white:text-white">
                  Load Unsaved Import
               </h3>
            </div>
            <form method="POST">
               <!-- Modal body -->
               <div class="px-6">
                  <span>Do you want to load unsaved data or cancel?</span>
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2">
                  <button type="button" data-modal-hide="checkUser" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" onclick='loadSchedule()'>Load</button>
                  <button type="button" data-modal-hide="checkUser" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-3xl w-full white:bg-red-600 white:hover:bg-red-700 white:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50" onclick='cancelSchedule()'>Cancel</button>
               </div>
            </form>
      </div>
   </div>
</div>
<div class='flex justify-center mt-42'>
   <span id='alt' class='font-medium text-lg'></span>
   <div id="hexagon-spinner" style="display:none">
      <div class="hexagon-loader"></div>
   </div>
</div>
   <div class="p-4">
      <div class="text-lg pb-4 font-medium uppercase">Upload Prices & Schedule & Load</div>
      <!-- <form method="POST" action="<?php echo e(route('uploadschedules.store')); ?>" enctype="multipart/form-data" id='uploadForm'> -->
      <form method="POST" enctype="multipart/form-data" id='uploadForm'>
         <?php echo csrf_field(); ?>
         <div class="w-full flex justify-between space-x-2 border-b pb-4">
            <div class="w-full">
               <input name="mpsl" id="mpsl" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 white:text-gray-400 focus:outline-none white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
               <p class="mt-1 text-sm text-gray-500 white:text-gray-300" id="file_input_help">Please follow the format before uploading to avoid error.</p>
            </div>
            <div class="w-40">
               <select name="run_hour" id="run_hour" class="block py-2.5 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 white:text-gray-400 focus:outline-none white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400" required> 
                  <option value="">--Select Interval--</option>
                  <?php for($x=0;$x<24;$x++): ?>
                  <option value="<?php echo e($x); ?>"><?php echo e($x); ?></option>
                  <?php endfor; ?>
               </select>
               <p class="mt-1 text-sm text-gray-500 white:text-gray-300" id="file_input_help">Select Interval</p>
            </div>
            <div class="">
               <input type="hidden" name="user_id" id='user_id' value="<?php echo e(Auth::id()); ?>">
               <input type="hidden" name="_token" id='_token' value="<?php echo e(csrf_token()); ?>">
               <button type="button" id="savecsv" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 white:bg-green-600 white:hover:bg-green-700 white:focus:ring-green-800 flex justify-center space-x-2" onclick='importSchedule()'>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                  </svg>
                  <span>Upload</span>
               </button>
            </div>
         </div>
      </form>
      <button data-modal-target="addType" data-modal-toggle="addType" style='display:none' class="hidebtn block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800 mb-2.5" type="button">
         Add New Powerplant
      </button>
      <div id="loadData">
         <?php if(sizeof($checker)): ?>
            <div  id="loadTable">
               <div class="">
                  <div id="alert-4" class="flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 white:bg-gray-800 white:text-yellow-300" role="alert">
                     <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="sr-only">Info</span>
                     <div class="ml-3 text-sm font-medium">
                        There are <b> New Resource Names </b> that are not in your masterfile <a href="#" class="font-semibold underline hover:no-underline">Click Save</a> to add all.
                     </div>
                     <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-yellow-300 white:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
                     <span class="sr-only">Close</span>
                     <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                     </button>
                  </div>
               </div>
               <form method="POST" action="<?php echo e(route('saveall')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="relative overflow-x-auto h-60 border rounded-md mb-4">
                     <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                        <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400">
                           <tr>
                              <th scope="col" class="px-6 py-3">
                                 Resource Name
                              </th>
                              <th scope="col" class="px-6 py-3">
                                 
                              </th>
                              <th scope="col" class="px-6 py-3">
                                 
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $x=0; ?>
                           <?php $__currentLoopData = $checker->chunk(100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                              <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700">
                                 <td scope="row" class="font-medium text-gray-900 whitespace-nowrap white:text-white">
                                    <input type="text" name="main_resource[]" id='main_resource<?php echo e($x); ?>' class='main_resource' style='border:transparent' value='<?php echo e($c->resource_name); ?>' readonly>
                                    <input type="hidden" name="id[]" id='id<?php echo e($x); ?>' class='id' style='border:transparent' value='<?php echo e($c->id); ?>' readonly>
                                 </td>
                                 <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap white:text-white">
                                    <select name="resource_name[]" id="resource_name<?php echo e($x); ?>" class="text-sm resource_name" onchange="hideSelectResource()">
                                       <option value="">--Select Like Resource Name--</option>
                                       <?php $__currentLoopData = $check_resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($cr->id); ?>"><?php echo e($cr->resource_id); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </td>
                                 <td scope="row" class="flex justify-start space-x-2 font-medium text-gray-900 whitespace-nowrap white:text-white ">
                                    <select name="powerplant[]" id="powerplant<?php echo e($x); ?>" class="text-sm powerplant" onchange="hideSelectPowerplant()">
                                       <option value="">--Select Powerplant--</option>
                                       <?php $__currentLoopData = $powerplant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($p->id); ?>"><?php echo e($p->facility_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <!-- <input type="text" id='operators<?php echo e($x); ?>' name='operator' class='addtext' style='display:none;' onblur='addPowerplantT(<?php echo e($x); ?>)'>
                                    <button id="btn_change<?php echo e($x); ?>" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800 mb-2.5 btn_change more" onclick="btnChange(<?php echo e($x); ?>)" type="button">
                                       Add New Powerplant
                                    </button> -->
                                 </td>
                              </tr>
                              <?php $x++; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <input type="hidden" id='counter' name='counter' value='<?php echo e($x); ?>'>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="w-full">
                     <div class='flex justify-center mt-42'>
                        <span id='altsaveall' class='font-medium text-lg'></span>
                     </div>
                     <button type="submit" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick='saveAllsched()' id='saveall'>Save File</button>
                     <!-- <a href="<?php echo e(route('uploadschedules.show', '1')); ?>" type="button" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save File</a> -->
                  </div>
               </form>
            </div>
         <?php endif; ?>
         <input type="hidden" id='check_user' name='check_user' value='<?php echo e($check_user); ?>'>
      </div>
   </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mdasv2\resources\views/upload_schedule/index.blade.php ENDPATH**/ ?>