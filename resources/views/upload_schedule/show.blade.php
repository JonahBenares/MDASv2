<x-app-layout>
    <div class="p-4 ">
        <div class="pb-4 flex justify-between">
            <div class="text-lg  font-medium uppercase">Upload Prices & Schedule & Load</div>
            <div class="">
                <a href="{{ route('uploadschedules.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload New</a>
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
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                            Apple MacBook Pro 17"
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                            Apple MacBook Pro 17"
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                    <tr class="bg-white white:bg-gray-800 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                            Apple MacBook Pro 17"
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
 
 
 </x-app-layout>
 