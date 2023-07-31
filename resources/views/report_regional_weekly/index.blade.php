<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        span.select2.select2-container.select2-container--classic{
            width: 100% !important;
        }
    </style>
    <div class='flex justify-center mt-42'>
        <div id="hexagon-spinner" style="display:block">
            <div class="hexagon-loader"></div>
        </div>
    </div>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Regional Summary <b>(WEEKLY)</b> </div>
            <form method="POST" action="{{ route('filter_regionalweekly') }}" onSubmit="return regweekValidation();">
                @csrf
                <div class="flex justify-center space-x-2 ">
                    <div class="w-36">
                        <input name="date_from" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" placeholder="Date From" class="filterregweek block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    </div>
                    <div class="w-36">
                        <input name="date_to" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" placeholder="Date To" class="filterregweek block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    </div>
                    <div class="w-48">
                        <select name='grid[]' class="filterregweek block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 js-example-basic-single" multiple>
                            <option value="">Select Grid</option>
                            @foreach($grid AS $r)
                            <option value="{{$r->id}}">{{$r->grid_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-xs px-5 py-2.5 mb-1  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex justify-between space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                            <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                        </svg> 
                        Filter
                    </button>
                </div>
            </form>
        </div>
        @if(!empty($_POST))
        <div class="">
            <div id="alert-border-5" class="flex p-4 border-t-4 shadow-md border-gray-300 bg-gray-50 white:bg-gray-800 white:border-gray-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                    <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0112 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 011.541 1.836v1.044a3 3 0 01-.879 2.121l-6.182 6.182a1.5 1.5 0 00-.439 1.061v2.927a3 3 0 01-1.658 2.684l-1.757.878A.75.75 0 019.75 21v-5.818a1.5 1.5 0 00-.44-1.06L3.13 7.938a3 3 0 01-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836z" clip-rule="evenodd" />
                  </svg>
                  
                <div class="ml-3 text-sm font-medium text-gray-800 white:text-gray-300 space-x-5">
                    @if(!empty($_POST['date_from']))
                        <span><b>Date From:</b> {{date('F d,Y',strtotime($_POST['date_from']))}}</span>      
                    @endif
                    @if(!empty($_POST['date_to']))
                        <span><b>Date To:</b> {{date('F d,Y',strtotime($_POST['date_to']))}}</span>      
                    @endif
                    @if(!empty($_POST['grid']))
                        <span><b>Grid:</b> <span class="text-blue-500"> {{getGridNameMultiple($_POST['grid'])}}</span> </span>      
                    @endif 
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        @php
            if(isset($_POST['grid'])){ 
                $grid_disp=$_POST['grid'];
            }else{
                $grid_disp=array();
            }
        @endphp
        @if(count($grid_disp)<=1)
            <div class="flex justify-between space-x-5">
                <div class="relative overflow-x-auto mt-4 w-7/12 h-[27rem]">
                    <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0">
                            <tr>
                                <th scope="col" class="px-1 py-1 border align-bottom" align="center">Date</th>
                                <th scope="col" class="px-1 py-1 border" align="center">Demand</th>
                                <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD BID</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD CURTAILED</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOSSES</th>
                                <th scope="col" class="px-1 py-1 border" align="center">IMPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">EXPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">NET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($weeklyregionalArray AS $wra)
                            @php 
                                if(empty($_POST['grid'])){
                                    $grid_id=0;
                                }else{
                                    $grid_id=$wra->grid_id;
                                }
                                $import_nega=-getweeklyRegionalAvg($wra->run_time,$grid_id,'import');
                                $net= $import_nega + getweeklyRegionalAvg($wra->run_time,$grid_id,'export');
                            @endphp
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td class="px-1 py-1 border align-bottom " align="center"> {{date('m/d/Y',strtotime($wra->run_time))}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'demand'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'generation'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_bid'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_curtailed'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'losses'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($import_nega,2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'export'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($net,2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="relative overflow-x-auto mt-4 w-7/12">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    
                    <script>
                        var cData = JSON.parse('@php echo $data['chart_data']@endphp');
                        const ctx = document.getElementById('myChart');
                        // var x = cData.import;
                        // var import_nega =-x;
                        new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: cData.label,
                            datasets: [
                                {
                                    label: 'Demand',
                                    data: cData.demand,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Generation',
                                    data: cData.generation,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Losses',
                                    data: cData.losses,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Import',
                                    data: cData.import,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Export',
                                    data: cData.export,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Net',
                                    data: cData.net,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat('en-PH', { maximumFractionDigits: 2, minimumFractionDigits: 2 }).format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                }
                            }
                        }
                        });
                    </script> 
                </div>
            </div>
        @elseif(count($grid_disp)>=2)
            <div class="flex justify-between space-x-5">
                @if(!empty($weeklyregionalLuzonArray))
                <div class="relative overflow-x-auto mt-4 @php echo (count($_POST['grid'])>=2) ? 'w-6/12' : 'w-4/12'; @endphp h-[27rem]">
                    <h3>LUZON</h3>
                    <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0">
                            <tr>
                                <th scope="col" class="px-1 py-1 border align-bottom" align="center">Date</th>
                                <th scope="col" class="px-1 py-1 border" align="center">Demand</th>
                                <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD BID</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD CURTAILED</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOSSES</th>
                                <th scope="col" class="px-1 py-1 border" align="center">IMPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">EXPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">NET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($weeklyregionalLuzonArray AS $wra)
                            @php 
                                if(empty($_POST['grid'])){
                                    $grid_id=0;
                                }else{
                                    $grid_id=$wra->grid_id;
                                }
                                $import_nega=-getweeklyRegionalAvg($wra->run_time,$grid_id,'import');
                                $net= $import_nega + getweeklyRegionalAvg($wra->run_time,$grid_id,'export');
                            @endphp
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td class="px-1 py-1 border align-bottom " align="center"> {{date('m/d/Y',strtotime($wra->run_time))}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'demand'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'generation'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_bid'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_curtailed'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'losses'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($import_nega,2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'export'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($net,2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div>
                        <canvas id="myChartluz"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    
                    <script>
                        var cDataluz = JSON.parse('@php echo $dataluz['chart_dataluz']@endphp');
                        const ctxluz = document.getElementById('myChartluz');
                        // var x = cDataluz.import;
                        // var import_nega =-x;
                        new Chart(ctxluz, {
                        type: 'bar',
                        data: {
                            labels: cDataluz.label,
                            datasets: [
                                {
                                    label: 'Demand',
                                    data: cDataluz.demand,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Generation',
                                    data: cDataluz.generation,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Losses',
                                    data: cDataluz.losses,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Import',
                                    data: cDataluz.import,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Export',
                                    data: cDataluz.export,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Net',
                                    data: cDataluz.net,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat('en-PH', { maximumFractionDigits: 2, minimumFractionDigits: 2 }).format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                }
                            }
                        }
                        });
                    </script> 
                </div>
                @endif
                @if(!empty($weeklyregionalVisayasArray))
                <div class="relative overflow-x-auto mt-4 @php echo (count($_POST['grid'])>=2) ? 'w-6/12' : 'w-4/12'; @endphp h-[27rem]">
                    <h3>VISAYAS</h3>
                    <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0">
                            <tr>
                                <th scope="col" class="px-1 py-1 border align-bottom" align="center">Date</th>
                                <th scope="col" class="px-1 py-1 border" align="center">Demand</th>
                                <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD BID</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD CURTAILED</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOSSES</th>
                                <th scope="col" class="px-1 py-1 border" align="center">IMPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">EXPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">NET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($weeklyregionalVisayasArray AS $wra)
                            @php 
                                if(empty($_POST['grid'])){
                                    $grid_id=0;
                                }else{
                                    $grid_id=$wra->grid_id;
                                }
                                $import_nega=-getweeklyRegionalAvg($wra->run_time,$grid_id,'import');
                                $net= $import_nega + getweeklyRegionalAvg($wra->run_time,$grid_id,'export');
                            @endphp
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td class="px-1 py-1 border align-bottom " align="center"> {{date('m/d/Y',strtotime($wra->run_time))}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'demand'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'generation'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_bid'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_curtailed'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'losses'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($import_nega,2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'export'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($net,2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div>
                        <canvas id="myChartvis"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    
                    <script>
                        var cDatavis = JSON.parse('@php echo $datavis['chart_datavis']@endphp');
                        const ctxvis = document.getElementById('myChartvis');
                        // var x = cDatavis.import;
                        // var import_nega =-x;
                        new Chart(ctxvis, {
                        type: 'bar',
                        data: {
                            labels: cDatavis.label,
                            datasets: [
                                {
                                    label: 'Demand',
                                    data: cDatavis.demand,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Generation',
                                    data: cDatavis.generation,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Losses',
                                    data: cDatavis.losses,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Import',
                                    data: cDatavis.import,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Export',
                                    data: cDatavis.export,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Net',
                                    data: cDatavis.net,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat('en-PH', { maximumFractionDigits: 2, minimumFractionDigits: 2 }).format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                }
                            }
                        }
                        });
                    </script> 
                </div>
                @endif
                @if(!empty($weeklyregionalMindanaoArray))
                <div class="relative overflow-x-auto mt-4 @php echo (count($_POST['grid'])>=2) ? 'w-6/12' : 'w-4/12'; @endphp h-[27rem]">
                    <h3>MINDANAO</h3>
                    <table class="w-full text-sm text-left text-gray-500 white:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 white:bg-gray-700 white:text-gray-400 sticky top-0">
                            <tr>
                                <th scope="col" class="px-1 py-1 border align-bottom" align="center">Date</th>
                                <th scope="col" class="px-1 py-1 border" align="center">Demand</th>
                                <th scope="col" class="px-1 py-1 border" align="center">GENERATION</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD BID</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOAD CURTAILED</th>
                                <th scope="col" class="px-1 py-1 border" align="center">LOSSES</th>
                                <th scope="col" class="px-1 py-1 border" align="center">IMPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">EXPORT</th>
                                <th scope="col" class="px-1 py-1 border" align="center">NET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($weeklyregionalMindanaoArray AS $wra)
                            @php 
                                if(empty($_POST['grid'])){
                                    $grid_id=0;
                                }else{
                                    $grid_id=$wra->grid_id;
                                }
                                $import_nega=-getweeklyRegionalAvg($wra->run_time,$grid_id,'import');
                                $net= $import_nega + getweeklyRegionalAvg($wra->run_time,$grid_id,'export');
                            @endphp
                            <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600">
                                <td class="px-1 py-1 border align-bottom " align="center"> {{date('m/d/Y',strtotime($wra->run_time))}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'demand'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'generation'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_bid'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'load_curtailed'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'losses'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($import_nega,2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format(getweeklyRegionalAvg($wra->run_time,$grid_id,'export'),2)}}</td>
                                <td class="px-1 py-1 border" align="center">{{number_format($net,2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div>
                        <canvas id="myChartmin"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    
                    <script>
                        var cDatamin = JSON.parse('@php echo $datamin['chart_datamin']@endphp');
                        const ctxmin = document.getElementById('myChartmin');
                        // var x = cDatamin.import;
                        // var import_nega =-x;
                        new Chart(ctxmin, {
                        type: 'bar',
                        data: {
                            labels: cDatamin.label,
                            datasets: [
                                {
                                    label: 'Demand',
                                    data: cDatamin.demand,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Generation',
                                    data: cDatamin.generation,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Losses',
                                    data: cDatamin.losses,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Import',
                                    data: cDatamin.import,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Export',
                                    data: cDatamin.export,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Net',
                                    data: cDatamin.net,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat('en-PH', { maximumFractionDigits: 2, minimumFractionDigits: 2 }).format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                }
                            }
                        }
                        });
                    </script> 
                </div>
                @endif
            </div>
        @endif
        @endif
    </div>
    <script>
        window.addEventListener("load", () => { 
            document.getElementById("hexagon-spinner").style.display = "none"; 
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.js-example-basic-single').select2({
            theme: "classic",
            placeholder: '--Select Grid--',
        });
    </script>
 </x-app-layout>
 