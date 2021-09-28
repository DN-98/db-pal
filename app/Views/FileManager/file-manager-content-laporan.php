<?php if($_SESSION['posisi_pengguna']=="adm"):?>
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="text-center whitespace-no-wrap">DATE</th>
                <th class="whitespace-no-wrap">IMAGES</th>
                <th class="whitespace-no-wrap">NAMA LAPORAN</th>
                <th class="text-center whitespace-no-wrap">STATUS</th>
                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $num) : ?>
                <tr class="intro-x">
                <td class="text-center" style="width: 200px;"><?= $num->tgl_buat; ?></td>
                    <td class="w-40" style="width: 10%;">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="<?= $num->lokasi_gambar; ?>" class="tooltip rounded-full" src="<?=base_url() . $num->lokasi_gambar?>" title="Uploaded at <?= $num->tgl_buat; ?>">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="" class=" font-medium whitespace-no-wrap"><?= $num->judul_laporan; ?></a>
                        <div style="max-width: 120px;" class="text-gray-600 text-xs whitespace-no-wrap overflow-hidden"><?= $num->detail_laporan; ?> . .</div>
                    </td>
                    <td class="w-40">
                        <?php if ($num->status_persetujuan == 2)
                            echo '<div class="flex items-center justify-center"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i></div>';
                        else if ($num->status_persetujuan == 1)
                            echo '<div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Approved</div>';
                        else {
                            echo '<div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i>Not Approved</div>';
                        }
                        ?>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="<?= base_url() ?>/file-manager/laporan-edit?id=<?= $num->id_laporan ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal-<?= $num->id_laporan ?>"> <i data-feather="trash-2" class="w-4 h-4 mr-1" data-id="<?= $num->id_laporan ?>"></i> Delete </a>
                            <!-- <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Show Modal</a> </div> -->
                            <div class="modal" id="delete-confirmation-modal-<?= $num->id_laporan ?>">
                                <div class="modal__content">
                                    <form action="<?= base_url() ?>/file-manager/proses-delete-laporan" method="POST">
                                        <input type="text" name="id" value="<?= $num->id_laporan ?>" hidden>
                                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-24 bg-theme-6 text-white" name="delete">Delete</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- END: Data List -->
<?php elseif($_SESSION['posisi_pengguna']=="usr"):?>
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="text-center whitespace-no-wrap">DATE</th>
                <th class="whitespace-no-wrap">IMAGES</th>
                <th class="whitespace-no-wrap">NAMA LAPORAN</th>
                <th class="text-center whitespace-no-wrap">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $num) : ?>
                <tr class="intro-x">
                <td class="text-center" style="width: 150px;"><?= $num->tgl_buat; ?></td>
                    <td class="w-40" style="width: 10%;">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="<?= $num->lokasi_gambar; ?>" class="tooltip rounded-full" src="<?=base_url() . $num->lokasi_gambar?>" title="Uploaded at <?= $num->tgl_buat; ?>">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="" class=" font-medium whitespace-no-wrap"><?= $num->judul_laporan; ?></a>
                        <div style="max-width: 120px;" class="text-gray-600 text-xs whitespace-no-wrap overflow-hidden"><?= $num->detail_laporan; ?> . .</div>
                    </td>
                    <td class="w-40">
                        <?php if ($num->status_persetujuan == 2)
                            echo '<div class="flex items-center justify-center"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i></div>';
                        else if ($num->status_persetujuan == 1)
                            echo '<div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Approved</div>';
                        else {
                            echo '<div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i>Not Approved</div>';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- END: Data List -->
<?php elseif($_SESSION['posisi_pengguna']=="kdp"):?>
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="text-center whitespace-no-wrap">DATE</th>
                <th class="whitespace-no-wrap">IMAGES</th>
                <th class="whitespace-no-wrap">NAMA LAPORAN</th>
                <th class="text-center whitespace-no-wrap">STATUS</th>
                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $num) : ?>
                <tr class="intro-x">
                    <td class="text-center" style="width: 200px;"><?= $num->tgl_buat; ?></td>
                    <td class="w-40" style="width: 10%;">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="<?= $num->lokasi_gambar; ?>" class="tooltip rounded-full" src="<?=base_url() . $num->lokasi_gambar?>" title="Uploaded at <?= $num->tgl_buat; ?>">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="" class=" font-medium whitespace-no-wrap"><?= $num->judul_laporan; ?></a>
                        <div style="max-width: 120px;" class="text-gray-600 text-xs whitespace-no-wrap overflow-hidden"><?= $num->detail_laporan; ?> . .</div>
                    </td>
                    <td class="w-40">
                        <?php if ($num->status_persetujuan == 2)
                            echo '<div class="flex items-center justify-center"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i></div>';
                            else if ($num->status_persetujuan == 1)
                            echo '<div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Approved</div>';
                        else {
                            echo '<div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i>Not Approved</div>';
                        }
                        ?>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <!-- <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> -->
                            <a class="text-theme-11 flex items-center" href="javascript:;" data-toggle="modal" data-target="#success-modal-preview-<?= $num->id_laporan ?>"> <i data-feather="edit" class="w-4 h-4 mr-1" data-id="<?= $num->id_laporan ?>"></i> Aprroval </a>
                            <div class="modal" id="success-modal-preview-<?= $num->id_laporan ?>">
                                <div class="modal__content">
                                    <form action="<?= base_url() ?>/file-manager/proses-approval-laporan" method="post">
                                    <input type="text" name="id" value="<?= $num->id_laporan ?>" hidden>
                                    <div class="p-5 text-center"> <i data-feather="help-circle" class="w-16 h-16 text-theme-1 mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Setujui Laporan ?</div>
                                        <!-- <div class="text-gray-600 mt-2">silahkan pilih</div> -->
                                    </div>
                                    <div class="px-5 pb-8 text-center"> 
                                    <button type="submit" class="button w-24 bg-theme-9 text-white" name="yes"><i data-feather="check" class="mx-auto"></i></button>
                                    <button type="submit" class="button w-24 bg-theme-6 text-white" name="no"><i data-feather="x" class="mx-auto"></i></button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- END: Data List -->
<?php endif;?>