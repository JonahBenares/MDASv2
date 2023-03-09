

<nav class="bg-white px-2 sm:px-4 py-2.5 white:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 white:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
            <span class="self-center text-xl font-bold whitespace-nowrap white:text-white">EMGv2</span>
        </a>
        <div class="flex md:order-2">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div><?php echo e(Auth::user()->name); ?></div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
                            <?php echo e(__('Profile')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

                        <!-- Authentication -->
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
                                <?php echo e(__('Log Out')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                        </form>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </div>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 white:text-gray-400 white:hover:bg-gray-700 white:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white white:bg-gray-800 md:white:bg-gray-900 white:border-gray-700">
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 white:text-white" aria-current="page">
                        Home
                    </a>
                </li>
                <li>
                    <button id="dropdownMasterfile" data-dropdown-toggle="dropdownNavMasterfile" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent">Masterfile <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavMasterfile" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700 white:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dashboard</a>
                          </li>
                          <li aria-labelledby="dropdownMasterfile">
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dropdown<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                            <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 white:text-gray-200" aria-labelledby="doubleDropdownButton">
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Overview</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">My downloads</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Billing</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Rewards</a>
                                  </li>
                                </ul>
                            </div>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Earnings</a>
                          </li>
                        </ul>
                        <div class="py-1">
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </li>
                <li>
                    <button id="dropdownUpload" data-dropdown-toggle="dropdownNavUpload" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent">Upload<svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavUpload" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700 white:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dashboard</a>
                          </li>
                          <li aria-labelledby="dropdownUpload">
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dropdown<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                            <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 white:text-gray-200" aria-labelledby="doubleDropdownButton">
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Overview</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">My downloads</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Billing</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Rewards</a>
                                  </li>
                                </ul>
                            </div>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Earnings</a>
                          </li>
                        </ul>
                        <div class="py-1">
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </li>
                <li>
                    <button id="dropdownReports" data-dropdown-toggle="dropdownNavReports" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto white:text-gray-400 white:hover:text-white white:focus:text-white white:border-gray-700 white:hover:bg-gray-700 md:white:hover:bg-transparent">Reports<svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavReports" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700 white:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 white:text-gray-400" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dashboard</a>
                          </li>
                          <li aria-labelledby="dropdownReports">
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Dropdown<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                            <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 white:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 white:text-gray-200" aria-labelledby="doubleDropdownButton">
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Overview</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">My downloads</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Billing</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Rewards</a>
                                  </li>
                                </ul>
                            </div>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 white:hover:bg-gray-600 white:hover:text-white">Earnings</a>
                          </li>
                        </ul>
                        <div class="py-1">
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 white:hover:bg-gray-600 white:text-gray-400 white:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </li>
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 white:text-gray-400 md:white:hover:text-white white:hover:bg-gray-700 white:hover:text-white md:white:hover:bg-transparent">Services</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 white:text-gray-400 md:white:hover:text-white white:hover:bg-gray-700 white:hover:text-white md:white:hover:bg-transparent">Pricing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



  <?php /**PATH C:\xampp\htdocs\EMGv2\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>