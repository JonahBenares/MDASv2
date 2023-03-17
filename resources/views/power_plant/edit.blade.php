<x-app-layout>
    <div class="p-4 ">
        <div class="mb-4 pb-2 flex justify-between border-b">
            <div class="text-lg  font-medium uppercase py-2">Power Plant <span class="bg-blue-500 rounded-2xl p-1 px-2 font-bold text-white text-xs">Update</span></div>
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
            <form class="mx-20" method="POST" action="{{ route('powerplant.update',$powerplant->id) }}" onsubmit="return confirm('Are you sure you want to proceed next?');">
                @csrf
                @method('PUT')
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-9/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Facility Name</label>
                        <input name="facility_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->facility_name}}">
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Short Name</label>
                        <input name="short_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->short_name}}">
                    </div>
                    
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Type</label>
                        <select name="pp_type_id" id="type-dropdown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                            <option value="">--Select Type--</option>
                            @foreach($powerplant_type AS $pt)
                                <option value="{{$pt->id}}" {{ ($pt->id==$powerplant->pp_type_id) ? 'selected' : '' }}>{{$pt->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Sub Type</label>
                        <select name="subtype_id" id="subtype-dropdown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                            <option value="">--Select Subtype--</option>
                            @foreach($powerplant_subtype AS $st)
                                <option value="{{$st->id}}" {{ ($st->id==$powerplant->subtype_id) ? 'selected' : '' }}>{{$st->subtype_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 w-6/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Operator</label>
                        <input name="operator" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->operator}}">
                    </div>
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Location/Municipality</label>
                        <input name="municipality" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->municipality}}">
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Grid</label>
                        <select name="grid_id" id="grid-dropdown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                            <option value="">--Select Grid--</option>
                            @foreach($grid AS $g)
                                <option value="{{$g->id}}" {{ ($g->id==$powerplant->grid_id) ? 'selected' : '' }}>{{$g->grid_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Region</label>
                        <select name="region" id="region-dropdown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                            <option value="">--Select Region--</option>
                            @foreach($region AS $r)
                                <option value="{{$r->id}}" {{ ($r->id==$powerplant->region) ? 'selected' : '' }}>{{$r->region_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Region ID</label>
                        <input name="region_id" id='region_id' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->region_id}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Capacity Installed (MW)</label>
                        <input name="capacity_installed" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->capacity_installed}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Capacity Dependable (MW)</label>
                        <input name="capacity_dependable" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->capacity_dependable}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Number of Units</label>
                        <input name="number_of_units" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->number_of_units}}">
                    </div>
                    
                </div>
                <div class="flex justify-between space-x-2">
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">IPPA</label>
                        <input name="ippa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->ippa}}">
                    </div>
                    <div class="mb-2 w-3/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Fit Approved</label>
                        <input name="fit_approved" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->fit_approved}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Owner Type</label>
                        <input name="owner_type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->owner_type}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Type of Contract</label>
                        <input name="type_of_contract" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light" value="{{$powerplant->type_of_contract}}">
                    </div>
                    <div class="mb-2 w-2/12">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select name="status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 white:shadow-sm-light">
                            <option value="">--Select Status--</option>
                            <option value="Active" {{ ($powerplant->status=='Active') ? 'selected' : ''}}>Active</option>
                            <option value="Inactive" {{ ($powerplant->status=='Inactive') ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-2">
                    <button type="submit" class="mb-2 w-2/12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">Next</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
 