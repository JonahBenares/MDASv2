<nav class="bg-white px-8 shadow-md sm:px-4 py-2.5 white:bg-gray-900 fixed w-full z-20 top-0 left-0 white:border-gray-600">
    <div class="flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ ('/dashboard') }}" class="flex items-center">
            <img src="../../images/mdasb1.png" class="h-6 mr-2 sm:h-9" alt="MDAS Logo">
            <span class="self-center text-2xl font-extrabold whitespace-nowrap white:text-white">MDAS<small>v2</small></span>
        </a>
        <div class="flex md:order-2">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="capitalize mr-2">{{ Auth::user()->name }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 01-.517.608 7.45 7.45 0 00-.478.198.798.798 0 01-.796-.064l-.453-.324a1.875 1.875 0 00-2.416.2l-.243.243a1.875 1.875 0 00-.2 2.416l.324.453a.798.798 0 01.064.796 7.448 7.448 0 00-.198.478.798.798 0 01-.608.517l-.55.092a1.875 1.875 0 00-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 01-.064.796l-.324.453a1.875 1.875 0 00.2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 01.796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 01.517-.608 7.52 7.52 0 00.478-.198.798.798 0 01.796.064l.453.324a1.875 1.875 0 002.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 01-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 001.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 01-.608-.517 7.507 7.507 0 00-.198-.478.798.798 0 01.064-.796l.324-.453a1.875 1.875 0 00-.2-2.416l-.243-.243a1.875 1.875 0 00-2.416-.2l-.453.324a.798.798 0 01-.796.064 7.462 7.462 0 00-.478-.198.798.798 0 01-.517-.608l-.091-.55a1.875 1.875 0 00-1.85-1.566h-.344zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" />
                              </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 white:text-gray-400 white:hover:bg-gray-700 white:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-white md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white white:bg-gray-800 md:white:bg-gray-900 white:border-gray-700">
                <li>
                    <a href="{{ ('/dashboard') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 white:text-white" aria-current="page" title="Home" data-tooltip-target="tooltip-default">
                        <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Home
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <button id="dropdownMasterfile" data-dropdown-toggle="dropdownNavMasterfile" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent" data-tooltip-target="tooltip-masterfile">
                        <div id="tooltip-masterfile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Masterfile
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z" clip-rule="evenodd" />
                        </svg>                          
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavMasterfile" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-auto white:bg-gray-700 white:divide-gray-600">
                        <div class="px-4 py-2 font-semibold">
                            Masterfile
                        </div>
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('grid.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Grid</a>
                            </li>
                          	<li>
                            	<a href="{{ route('region.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Region</a>
                          	</li>
                            <li>
                            	<a href="{{ route('pricenodes.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Price Nodes</a>
                          	</li>
                            <li>
                            	<a href="{{ route('resourcetype.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Resource Type</a>
                          	</li>
                            <li>
                            	<a href="{{ route('powerplant.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Power Plant</a>
                          	</li>
                            <li>
                            	<a href="{{ route('powerplanttype.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Power Plant Type</a>
                          	</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="dropdownUpload" data-dropdown-toggle="dropdownNavUpload" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent" data-tooltip-target="tooltip-upload">
                        <div id="tooltip-upload" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Upload File
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M11.47 1.72a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 01-1.06-1.06l3-3zM11.25 7.5V15a.75.75 0 001.5 0V7.5h3.75a3 3 0 013 3v9a3 3 0 01-3 3h-9a3 3 0 01-3-3v-9a3 3 0 013-3h3.75z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavUpload" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-auto white:bg-gray-700 white:divide-gray-600">
                        <div class="px-4 py-2 font-semibold">
                            Upload
                        </div>
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                          	<li>
                            	<a href="{{ route('uploadschedules.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Prices & Schedule & Load</a>
                          	</li>
                          	<li>
                            	<a href="{{ route('uploadhap.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Hour Ahead Projection</a>
                          	</li>
                            <li>
                            	<a href="{{ route('uploadregional.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Regional Summary</a>
                          	</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="dropdownReports" data-dropdown-toggle="dropdownNavReports" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent" data-tooltip-target="tooltip-report">
                        <div id="tooltip-report" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Reports
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavReports" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-auto white:bg-gray-700 white:divide-gray-600">
                        <div class="px-4 py-2 font-semibold">
                            Reports
                        </div>
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                              <a href="{{ route('reportschedules.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Prices & Schedule & Load</a>
                            </li>
                            <li>
                                <a href="{{ route('reportschedaverage.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Prices & Schedule & Load <b>(Average)</b></a>
                              </li>
                            <li>
                              <a href="{{ route('uploadhap.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Hour Ahead Projection</a>
                            </li>
                            <li>
                              <a href="{{ route('reportregional.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Regional Summary</a>
                            </li>
                            <li>
                                <a href="{{ route('reportregionalaverage.index') }}" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Regional Summary <b>(Average)</b></a>
                            </li>
                      </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>



  