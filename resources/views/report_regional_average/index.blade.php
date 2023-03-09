<x-app-layout>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Regional Summary <b>(AVERAGE)</b> </div>
            <div class="flex justify-center space-x-4 ">
                <div class="w-60">
                    <input type="date"  class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                </div>
                <button type="button" class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-xs px-5 py-2.5 mb-1  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                        <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                    </svg> 
                    Filter
                </button>
            </div>
        </div>
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                  </svg>
                  
                <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    <span><b>Date:</b> January 20, 2022</span>      
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        <div class="relative overflow-x-auto h-96 mt-4">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0">
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom" align="center"></th>
                        <th scope="col" class="px-1 py-1 border" align="center" colspan="5">ENERGY</th>
                        <th scope="col" class="px-1 py-1 border" align="center" colspan="2">DR</th>
                        <th scope="col" class="px-1 py-1 border" align="center" colspan="2">FR-CONTINGENCY</th>
                        <th scope="col" class="px-1 py-1 border" align="center" colspan="2">RU-REGULATING</th>
                        <th scope="col" class="px-1 py-1 border" align="center" colspan="2">RD-REGULATING</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-1 py-1 border align-bottom" align="center">INTERVAL</th>
                        <th scope="col" class="px-1 py-1 border" align="center">DEMAND</th>
                        <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                        <th scope="col" class="px-1 py-1 border" align="center">LOSSES</th>
                        <th scope="col" class="px-1 py-1 border" align="center">EXPORT</th>
                        <th scope="col" class="px-1 py-1 border" align="center">IMPORT</th>
                        <th scope="col" class="px-1 py-1 border" align="center">DEMAND</th>
                        <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                        <th scope="col" class="px-1 py-1 border" align="center">DEMAND</th>
                        <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                        <th scope="col" class="px-1 py-1 border" align="center">DEMAND</th>
                        <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                        <th scope="col" class="px-1 py-1 border" align="center">DEMAND</th>
                        <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
                        <td class="px-1 py-1 border align-bottom " align="center"> 01</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
                        <td class="px-1 py-1 border" align="center">0.00</td>
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
 