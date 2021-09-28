<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form method="POST" data-single="false" data-file-types="image/jpeg|image/png|image/jpg" action="<?= base_url() ?>/file-manager/upload_image_laporan" class="dropzone border-gray-200 border-dashed" >
                <!-- <label>Tambahkan Gambar</label> -->
                <div class="fallback"> <input name="file" type="image/jpeg|image/png|image/jpg" /></div>
                <div class="dz-message" data-dz-message>
                    <div class="text-lg font-medium">Drop files here or click to upload.</div>
                    <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                </div>
            </form>
            <form action="" method="post">
                <button type="submit"></button>
            </form>
            <form method="POST" action="<?= base_url() ?>/file-manager/laporan-baru/proses-laporan-baru">
                <div>
                    <label>Judul Laporan</label>
                    <input type="text" class="input w-full border mt-2" placeholder="Input text" name="judul_laporan">
                </div>
                <div>
                    <label>Detail Laporan</label>
                    <textarea class="input w-full border mt-2" name="detail_laporan"></textarea>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white" name="submit">Save</button>
                </div>
            </form>
        </div>
        <!-- END: Form Layout -->
    </div>
</div>
<script src="<?php base_url() ?>/js/app.js"></script>