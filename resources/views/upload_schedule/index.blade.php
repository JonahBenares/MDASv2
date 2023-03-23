<x-app-layout>
   <div class="p-4">
      <div class="text-lg pb-4 font-medium uppercase">Upload Prices & Schedule & Load</div>
      <form method="POST" action="{{ route('uploadschedules.store') }}" enctype="multipart/form-data">
         @csrf
         <div class="w-full flex justify-between space-x-2 border-b pb-4">
            <div class="w-full">
               <input name="mpsl" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 white:text-gray-400 focus:outline-none white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
               <p class="mt-1 text-sm text-gray-500 white:text-gray-300" id="file_input_help">Please follow the format before uploading to avoid error.</p>
            </div>
            <div class="w-40">
               <select name="run_hour" class="block py-2.5 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 white:text-gray-400 focus:outline-none white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400" > 
                  <option value="">--Select Interval--</option>
                  @for($x=0;$x<24;$x++)
                  <option value="{{$x}}">{{$x}}</option>
                  @endfor
               </select>
               <p class="mt-1 text-sm text-gray-500 white:text-gray-300" id="file_input_help">Select Interval</p>
            </div>
            <div class="">
               <input type="hidden" name="user_id" value="{{Auth::id()}}">
               <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 white:bg-green-600 white:hover:bg-green-700 white:focus:ring-green-800 flex justify-center space-x-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                  </svg>
                  <span>Upload</span>
               </button>
            </div>
         </div>
      </form>
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
      <form action="{{route('saveall')}}" method="post">

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
                  @foreach($checker AS $c)
                  <tr class="bg-white border-b white:bg-gray-800 white:border-gray-700">
                     <td scope="row" class="font-medium text-gray-900 whitespace-nowrap white:text-white">
                        {{$c->resource_name}}
                     </td>
                     <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap white:text-white">
                        <select name="resource_name" id="resource_name" class="text-sm">
                           <option value="">--Select Like Resource Name--</option>
                           @foreach($check_resource AS $cr)
                              <option value="{{$cr->id}}">{{$cr->resource_id}}</option>
                           @endforeach
                        </select>
                     </td>
                     <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap white:text-white">
                        <select name="resource_name" id="resource_name" class="text-sm">
                           <option value="">--Select Powerplant--</option>
                           @foreach($powerplant AS $p)
                              <option value="{{$p->id}}">{{$p->operator}}</option>
                           @endforeach
                        </select>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

         <div class="w-full">
            <button type="submit" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save File</button>
            <!-- <a href="{{ route('uploadschedules.show', '1') }}" type="button" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save File</a> -->
         </div>
      </form>
   </div>


</x-app-layout>
