<div class="grid grid-cols-12 gap-6 mt-8">
    <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            File Manager - <?= $sub_page ?>
        </h2>
        <!-- BEGIN: File Manager Menu -->
        <div class="intro-y box p-5 mt-6">
            
            <div class="mt-1">
                <a href="<?= base_url() ?>/file-manager/laporan_rusak" class="flex items-center px-3 py-2 rounded-md <?php if ($sub_page == "Laporan Rusak") echo "bg-theme-1 text-white font-medium"; ?>">
                    <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                    Laporan Kerusakan
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                    Laporan Maintenance
                </a>
                <!-- <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                    Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                    Design
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                    Next Week
                </a> -->
                <div class="border-t border-gray-200 dark:border-dark-5 mt-5 pt-5">
                <a href="<?= base_url() ?>/file-manager/images" class="flex items-center px-3 py-2 rounded-md <?php if ($sub_page == "") echo "bg-theme-1 text-white font-medium"; ?>"> <i class="w-4 h-4 mr-2" data-feather="image"></i> Images </a>
                <!-- <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="video"></i> Videos </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="file"></i> Documents </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="users"></i> Shared </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="trash"></i> Trash </a> -->
            </div>
                <!-- <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Label </a> -->
            </div>
        </div>
        <!-- END: File Manager Menu -->
    </div>