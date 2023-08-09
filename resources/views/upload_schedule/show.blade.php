<x-app-layout>
    <div class='flex justify-center mt-42'>
        <div id="hexagon-spinner" style="display:block">
            <div class="hexagon-loader"></div>
        </div>
    </div>  
    <div class="p-4 ">
        <div class="pb-4 flex justify-between">
            <div class="text-lg  font-medium uppercase">Upload Prices & Schedule & Load</div>
            <div class="flex justify-between space-x-2 ">
                <a href="{{ route('uploadschedules.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-center">Upload New</a>
                <div>
                    <form action="{{ route('uploadschedules.search') }}" method="GET" class='flex justify-between space-x-2 w-60' onSubmit="return selectValidationDT();">
                        <span class="border border-r-1 border-gray-300"></span>
                        <input type="text" name='filter' placeholder="Search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light filter" autocomplete="off">
                        <button type="submit"  id='btn_filter' class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-xs px-5 py-2.5 mb-1  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                            </svg> 
                            Filter
                        </button>
                        <input type="hidden" name='identifier' id='identifier' value='{{ $identifier }}'>
                    </form>
                </div>
            </div>
        </div>
        @if(isset($_GET['filter']))
        <div id="alert-border-5" class="flex p-4 border-t-4 mb-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
            </svg>
            <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                @if(isset($_GET['filter']))
                <span><b>Filter:</b> {{ $_GET['filter']}}</span> 
                @endif
            </div>
            <a  type="button" href="{{ route('uploadschedules.show', $_GET['identifier']) }}" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close" onclick='return selectValidationDT();'>
                <span class="sr-only">Dismiss</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        @endif
        <div class="relative overflow-x-auto" id='loadData1'>
            <div id="loadTable1">
            <table class="w-full text-sm text-left text-gray-500 white:text-gray-400 add_class">
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
                <tbody class='show_list'>
                    @if(sizeof($scheduleload))
                    @foreach($scheduleload AS $sl)
                        <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600 hide_list">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap white:text-white">
                                {{ $sl->run_time }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$sl->mkt_type}}
                            </td>
                            <td class="px-6 py-4">
                                {{$sl->time_interval}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $sl->region_name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$sl->resource_name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$sl->resource_type}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->schedule_mw,4)}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->lmp,4)}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->loss_factor,4)}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->lmp_smp,4)}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->lmp_loss,4)}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($sl->congestion,4)}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class='text-center' colspan='12'><b>No Available Data..</b></td>
                    </tr>
                    @endif
            </tbody>
        </table>
        <span class='hide_paginate' onclick='return selectValidationDT();'>{!! $scheduleload->links() !!}</span>
        </div>
        </div>


    </div>
    <script>
        window.addEventListener("load", () => { 
            document.getElementById("hexagon-spinner").style.display = "none"; 
        }); 
        // $(document).on("keyup", ".filter", function () {
        //     var filter = $(this).val();
        //     var identifier = $('#identifier').val();
        //     var base_url = '{{URL::to("/")}}';
        //     $.ajax({
        //         type: "POST",
        //         url:base_url+"/uploadschedules/filter_datatable",
        //         data: { 
        //             filter: filter,
        //             identifier: identifier,
        //             _token: '{{csrf_token()}}'
        //         },
        //         success:function(result){
        //             //console.log(result);
        //             //$("#loadData1").load("/uploadschedules/"+identifier+" #loadTable1");
        //             //$('#loadData1').load("#loadTable1");
        //             // var myarr = result.split("|");
        //             // $(".show_list").html(myarr[0]);
        //             // $(".show_paginate").html(myarr[1]);
        //             // $(".hide_list").hide();
        //             // $(".hide_paginate").hide();
        //             //window.location=base_url+'/uploadschedules/'+identifier+'/'+filter;
        //         }
        //     })
        // });
    </script>
 </x-app-layout>
 