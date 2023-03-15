<x-app-layout>
    <div class="p-4 ">
        <div class="mb-4 pb-2 flex justify-between border-b">
            <div class="text-lg  font-medium uppercase py-2">Resource Type <span class="bg-indigo-500 rounded-2xl p-1 px-2 font-bold text-white text-xs">Update</span></div>
            <div class="">
                <a href="{{ route('resourcetype.index') }}" class=""> 
                    <div class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 white:bg-blue-600 white:hover:bg-blue-700 focus:outline-none white:focus:ring-blue-800 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                            <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                        View List
                    </div>
                </a>
            </div>
        </div>
        <div class="relative overflow-x-auto border-b mb-2 pb-4">
            @if(Session::has('success'))
                <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{Session::get('success')}}</span>
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="mb-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{Session::get('fail')}}</span>
                </div>
            @endif
            <form action="{{ route('resourcetype.update',$resource_type->id) }}" method='POST'>
                @csrf
                @method('PUT')
                <div class="flex justify-center space-x-2">
                    <div class="mb-2 w-60">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Code</label>
                        <input name="resource_code" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$resource_type->resource_code}}">
                    </div>
                    <div class="mb-2 w-80">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Resource Type</label>
                        <input name="resource_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$resource_type->resource_name}}">
                    </div>
                    <button type="submit" class="mb-2 mt-7 text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-indigo-600 white:hover:bg-indigo-600 white:focus:ring-indigo-800">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
 