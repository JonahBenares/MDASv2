<x-app-layout>
    <div class="p-4 ">
        <div class="pb-4 flex justify-between">
            <div class="text-lg  font-medium uppercase">Hour Ahead Projection</div>
            <div class="">
                <a href="{{ route('uploadhap.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload New</a>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400 " id="table-01">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            RUN TIME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            INTERVAL END
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PRICE NODE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            mw
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LMP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOSS FACTOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ENERGY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LOSS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CONGESTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hap AS $h)
                    <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                            {{$h->run_time}}
                        </td>
                        <td class="px-6 py-4">
                            {{$h->interval_end}}
                        </td>
                        <td class="px-6 py-4">
                            {{$h->price_node}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->mw,4)}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->lmp,4)}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->loss_factor,4)}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->energy,4)}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->loss,4)}}
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($h->congestion,4)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
 
 
 </x-app-layout>
 