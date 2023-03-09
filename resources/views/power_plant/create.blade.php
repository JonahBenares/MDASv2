<x-app-layout>
    <div class="p-4 ">
        <div class="mb-4 pb-2 flex justify-between border-b">
            <div class="text-lg  font-medium uppercase py-2">Power Plant <span class="bg-blue-500 rounded-2xl p-1 px-2 font-bold text-white text-xs">Add new</span></div>
            <div class="">
                <a href="{{ route('powerplant.index') }}" class=""> 
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
            <form class="mx-20">
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-9/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Facility Name</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Short Name</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Type</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Sub Type</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-6/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Operator</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-6/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Municipality/Province</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Location</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                        </select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Participant ID</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Region</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Region ID</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Capacity Installed (MW)</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Capacity Dependable (MW)</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Number of Units</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">IPPA</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                        </select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Fit Approved</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Owner Type</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light"></select>
                    </div>
                    <div class="mb-2 w-2/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Type of Contract</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-2">
                    <button type="submit" class="mb-2 w-2/12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
 