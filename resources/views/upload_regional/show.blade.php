<x-app-layout>
    <div class="p-4 ">
        <div class="pb-4 flex justify-between">
            <div class="text-lg  font-medium uppercase">Regional Summary</div>
            <div class="">
                <a href="{{ route('uploadregional.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload New</a>
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
                            COMMODITY_TYPE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MKT_REQT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOAD_BID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOAD_CURTAILED
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOSSES
                        </th>
                        <th scope="col" class="px-6 py-3">
                            GENERATION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MKT_IMPORT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MKT_EXPORT
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regional->chunk(100) AS $chunkreg)
                        @foreach($chunkreg AS $r)
                        <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                                {{$r->run_time}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->mkt_type}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->time_interval}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->region_name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->commodity_type}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->demand,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->load_bid,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->load_curtailed,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->losses,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->generation,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->import,4)}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($r->export,4)}}
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
 
 
 </x-app-layout>
 