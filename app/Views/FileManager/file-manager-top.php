<div class="col-span-12 lg:col-span-9 xxl:col-span-10">
    <?php if (isset($message))
        echo $message;
    ?>
    <!-- BEGIN: File Manager Top Laporan -->
    <?php if ($tipe == 'laporan') : ?>
        <!-- END: File Manager Top Laporan -->
        <h2 class="intro-y text-lg font-medium mt-10">
            Data List Layout
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <?php if($_SESSION['posisi_pengguna'] == "usr"):?>
                <form action="<?= base_url()?>/file-manager/laporan-baru" method="get">
                    <button class="button text-white bg-theme-1 shadow-md mr-2" name="baru">Add New Report</button>
                </form>
                <?php endif;?>
                <!-- <div class="dropdown">
                    <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="arrow-down"></i> </span>
                    </button>
                    <div class="dropdown-box w-40">
                        <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </div>
                    </div>
                </div> -->
                <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-gray-700 dark:text-gray-300">
                        <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" data-feather="search"></i>
                    <input type="text" class="input w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13" placeholder="Search files">
                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-placement="bottom-start">
                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" data-feather="chevron-down"></i>
                        <div class="inbox-filter__dropdown-box dropdown-box pt-2">
                            <div class="dropdown-box__content box p-5">
                                <div class="grid grid-cols-12 gap-4 row-gap-3">
                                    <div class="col-span-6">
                                        <div class="text-xs">File Name</div>
                                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Type the file name">
                                    </div>
                                    <div class="col-span-6">
                                        <div class="text-xs">Shared With</div>
                                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com">
                                    </div>
                                    <div class="col-span-6">
                                        <div class="text-xs">Created At</div>
                                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Important Meeting">
                                    </div>
                                    <div class="col-span-6">
                                        <div class="text-xs">Size</div>
                                        <select class="input w-full border mt-2 flex-1">
                                            <option>10</option>
                                            <option>25</option>
                                            <option>35</option>
                                            <option>50</option>
                                        </select>
                                    </div>
                                    <div class="col-span-12 flex items-center mt-3">
                                        <button class="button w-32 justify-center block bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 ml-auto">Create Filter</button>
                                        <button class="button w-32 justify-center block bg-theme-1 text-white ml-2">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto flex">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">Upload New Files</button>
                    <div class="dropdown">
                        <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                        </button>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- END: File Manager Filter -->