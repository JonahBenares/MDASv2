<x-app-layout>
    <div class='flex justify-center mt-42'>
        <div id="hexagon-spinner" style="display:block">
            <div class="hexagon-loader"></div>
        </div>
    </div>
    <div class="p-4 ">
        <div class="pb-2 flex justify-between border-b ">
            <div class="text-lg font-medium uppercase align-baseline inline-block leading-none py-3">Outages Capacity by Outage Type</div>
            <form method="POST" action="{{ route('filter_outagetype') }}" onSubmit="return outagetypeValidation();">
                @csrf
                <div class="flex justify-center space-x-2 ">
                    <div class="w-36">
                        <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" placeholder="Date" class="filteroutagetype block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
                    </div>
                    <div class="w-48">
                        <select name='grid' class="filteroutagetype block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500">
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
                    <span><b>Grid:</b> <span class="text-blue-500"> Luzon</span> </span>     
                    <span><b>Date:</b> January 20, 2022</span>      
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 white:bg-gray-800 white:text-gray-300 white:hover:bg-gray-700 white:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        <div class="flex justify-between space-x-5">
            <div class="relative overflow-x-auto mt-4 w-8/12">
                <div>
                    <canvas id="bargraph"></canvas>
                </div>
            </div>
            <div class="relative overflow-x-auto mt-4 w-4/12 h-[27rem]">
                <div>
                    <canvas id="piegraph"></canvas>
                </div>
            </div>
        </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if(!empty($_POST))             
        <script>
            var cData = JSON.parse('@php echo $data['chart_data'] @endphp');
            const ctx = document.getElementById('bargraph');
            new Chart(ctx, {
            type: 'line',
            data: {
                labels: cData.label,
                datasets: [
                    {
                        label: 'Planned',
                        data: cData.planned,
                        borderWidth:1,
                        fill:1,
                    },
                    {
                        label: 'Unplanned',
                        data: cData.unplanned,
                        borderWidth:1,
                        fill:1,
                    }
            ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
            });
            
            const piex = document.getElementById('piegraph');
        
            new Chart(piex, {
            type: 'pie',
            data: {
                labels: ['Geothermal', 'Wind', 'Biomass', 'Coal'],
                datasets: [
                    {
                        label: 'Unplanned',
                        data: [6500, 7500, 8500, 5500, 2200, 4000],
                        borderWidth:2
                    },
            ]
            },
            // options: {
            //     scales: {
            //     y: {
            //         beginAtZero: false
            //     }
            //     }
            // }
            });
        </script>
    @endif
    <script>
        window.addEventListener("load", () => { 
            document.getElementById("hexagon-spinner").style.display = "none"; 
        });
    </script>
 </x-app-layout>
 