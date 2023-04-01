<x-app-layout>
   <div class='flex justify-center mt-42'>
      <span id='alt' class='font-medium text-lg'></span>
      <div id="hexagon-spinner" style="display:none">
         <div class="hexagon-loader"></div>
      </div>
   </div>
   <div class="p-4">
      <div class="text-lg pb-4 font-medium uppercase">Upload Regional Summary</div>
      <form method="POST" enctype="multipart/form-data" id='uploadregForm'>
         @csrf
         <div class="w-full flex justify-between space-x-2 border-b pb-4">
            <div class="w-full">
               <input name='reg_sum' id='reg_sum' class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 white:text-gray-400 focus:outline-none white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400" aria-describedby="file_input_help" type="file">
               <p class="mt-1 text-sm text-gray-500 white:text-gray-300" id="file_input_help">Please follow the format before uploading to avoid error.</p>
            </div>
            <div class="">
               <input type="hidden" name="user_id" id='user_id' value="{{Auth::id()}}">
               <input type="hidden" name="_token" id='_token' value="{{ csrf_token() }}">
               <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 white:bg-green-600 white:hover:bg-green-700 white:focus:ring-green-800 flex justify-center space-x-2" onclick='importRegional()'>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                  </svg>
                  <span>Upload</span>
               </button>
            </div>
         </div>
      </form>
      <!--<div class="w-full">
         <button type="submit" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick='saveAllsched()' id='saveregall'>Save File</button>
         <a href="{{ route('uploadregional.show', '1') }}" type="button" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save File</a>
      </div> -->
   </div>


</x-app-layout>
