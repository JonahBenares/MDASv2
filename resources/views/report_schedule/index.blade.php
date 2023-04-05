<x-app-layout>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Prices & Schedule & Load</div>
            <div class="flex justify-center space-x-4 ">
                <span class="flex items-center text-sm font-medium text-gray-500 white:text-white">Legend:</span>
                @foreach($powerplant_type AS $pt)
                    <div class="flex items-center text-sm font-medium text-gray-500 white:text-white"><span class="flex w-2.5 h-2.5 rounded-full mr-1 flex-shrink-0" style="background:{{$pt->legend}}"></span>{{$pt->type_name}}</div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center pb-4  mt-4 space-x-2">
            <div class="flex ">
                <span class="inline-flex items-center px-2 text-xs text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md white:bg-gray-600 white:text-gray-400 white:border-gray-600">
                  Interval
                </span>
                <input type="text" class="text-center w-10 rounded-none border-r-0 bg-gray-50 text-xs border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                <input type="text" class="text-center w-10 rounded-none rounded-r-lg bg-gray-50 text-xs border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
            </div>
            <div class="w-60">
                <input type="date"  class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
            </div>
            <div class="w-60">
                <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Region</option>
                </select>
            </div>
            <div class="w-60">
                <select type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Resource Type</option>
                </select>
            </div>
            <div class="w-60">
                <select type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Resource ID</option>
                </select>
            </div>
            <div class="w-60">
                <select type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Power Plant Type</option>
                </select>
            </div>
            <div class="w-60">
                <select type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    <option value="">Select Include/ Exclude 0 MW</option>
                </select>
            </div>
            <button type="button" class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-xs px-5 py-2.5 mb-1  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                </svg> 
                Filter
            </button>
        </div>
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 mb-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                </svg>
                <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    <span><b>Date:</b> January 20, 2022</span>    
                    <span><b>Region:</b> January 20, 2022</span>    
                    <span><b>Resource Type:</b> January 20, 2022</span>    
                    <span><b>Power Plant Type:</b> January 20, 2022</span>    
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        <div class="relative overflow-x-auto h-96">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-0 bg-gray-50" colspan="4" align="right">Interval</th>
                        @foreach(range(intval('00:00:00'),intval('23:00:00')) as $time) 
                        <th scope="col" class="px-1 py-1 border align-bottom" colspan="24" align="center">{{ ((date("H", mktime($time+1))!='00') ? date("H", mktime($time+1)) : '24') }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-0 bg-gray-50" colspan="4" align="right">Minute</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">5</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">10</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">15</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">20</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">25</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">30</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">35</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">40</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">45</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">50</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">55</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">00</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">5</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">10</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">15</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">20</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">25</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">30</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">35</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">40</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">45</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">50</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">55</th>
                        <th scope="col" class="px-1 py-1 border" colspan="2" align="center">00</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Delivery_Hour</th>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">Region</th>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">Resource_Type</th>
                        <th scope="col" class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center">Resource_Name</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">MW</th>
                        <th scope="col" class="px-1 py-1 border w-10" align="center">P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-1 py-1 border align-bottom sticky left-[0px] bg-white" align="center">Visayas</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[106px] bg-white" align="center">GEN</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[161px] bg-white" align="center">WESM</td>
                        <td class="px-1 py-1 border align-bottom sticky left-[268px] bg-white" align="center"> 400CENPRI_01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
 </x-app-layout>
 