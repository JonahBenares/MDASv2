<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <form method="POST">
                    <!-- Modal body -->
                    <div class="px-6 py-3">
                        <div class="mb-2">
                            <label class="py-1 text-sm">Date</label>
                            <input type="date" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="flex justify-between space-x-2 mb-2">
                            <div class="w-full">
                                <label class="py-1 text-sm">Interval Start</label>
                                <input type="text" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                            </div>
                            <div class="w-full">
                                <label class="py-1 text-sm">Interval End</label>
                                <input type="text" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" >
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Power Plant type</label>
                            <select type="date" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > 
                                <option value="">Select Power Plant Type</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Resource ID</label>
                            <input type="text" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Capacity</label>
                            <input type="text" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Outage Type</label>
                            <select type="date" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" > 
                                <option value="">Select Outage Type</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="py-1 text-sm">Remarks</label>
                            <textarea type="text" name="type_name" class="block text-sm w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" rows="3">
                            </textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center px-5 py-3 border-t">
                        <button type="submit" data-modal-hide="addType" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-3xl w-full white:bg-blue-600 white:hover:bg-blue-700 white:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Actual Outages</b> </div>
            <div class="flex justify-end">
                <div class="flex justify-center space-x-2 border-r pr-2">
                    <div class="w-40">
                        <input type="date"  class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    </div>
                    <div class="w-40">
                        <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                            <option value="">Select Grid</option>
                        </select>
                    </div>
                    <div class="w-44">
                        <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                            <option value="">Select Resource ID</option>
                        </select>
                    </div>
                    <button type="button" class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2 mb-1 pt-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                            <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                        </svg> 
                        Filter
                    </button>
                </div>
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
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                  </svg>
                  
                  <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    <span><b>Date:</b> January 20, 2022</span>    
                    <span><b>Grid:</b> Visayas</span>    
                    <span><b>Resource ID:</b> 01CEBU92881</span>       
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
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
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b-2 border-red-500 white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">April 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="border" align="center">May 01</td>
                        <td class="border" align="center">01-24</td>
                        <td class="border" align="center">Geothermal</td>
                        <td class="border" align="center">05CEDC_U01</td>
                        <td class="border" align="center">0.00</td>
                        <td class="border" align="center">
                            <select type="text" class="w-full h-full text-xs py-1 border-0">
                                <option value="">Unplanned</option>
                            </select>
                        </td>
                        <td class="pb-0 border" align="center">
                            <textarea class="w-full h-full m-0 py-1 text-xs border-0" rows="1" name="" id="" ></textarea>
                        </td>
                        <td class="border" align="center">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-full fixed bottom-0 px-5 pb-2 flex justify-center left-0">
            <button data-modal-target="addOutage" data-modal-toggle="addOutage" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2 mb-1 pt-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                Save
            </button>
        </div>
    </div>
  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
 <?php /**PATH C:\xampp\htdocs\MDASv2\resources\views/actual_outages/index.blade.php ENDPATH**/ ?>