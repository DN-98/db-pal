<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\MainModel;

class FileManager extends BaseController
{
    public function index()
    {
        if (!$this->session->has('id_pengguna'))
            $this->response->redirect(base_url() . "/login");
        else {
            $x = ['page' => "File Manager", "sub_page" => ''];
            echo view('head', ['title' => "File Manager- Condition Monitoring"]);
            echo view('side-bar', $x);
            // BEGIN: content
            echo view('FileManager/top-bar', $x);
            echo view('FileManager/file-manager-side');
            echo view('FileManager/file-manager-top', ['tipe' => '']);
            echo view('FileManager/file-manager-content-file');
            echo view('FileManager/file-manager-pagination');
            // END: content
        }
    }

    public function laporan_rusak()
    {
        if (!$this->session->has('id_pengguna'))
            $this->response->redirect(base_url() . "/login");
        else {
            $laporan = new MainModel();
            $x = ['page' => "File Manager", "sub_page" => 'Laporan Rusak'];
            if (isset($_GET['sukses']))
                $x['message'] = "Data Berhasil di Simpan";
            echo view('head', ['title' => "File Manager- Condition Monitoring"]);
            echo view('Home/side-bar', $x);
            // BEGIN: content
            echo view('Home/top-bar', $x);
            $data = $laporan->get_laporan();
            echo view('FileManager/file-manager-side');
            echo view('FileManager/file-manager-top', ['tipe' => 'laporan']);
            echo view('FileManager/file-manager-content-laporan', ['data' => $data]);
            echo view('FileManager/file-manager-pagination');
            // END: content
        }
    }

    public function laporan_edit()
    {
        if (!$this->session->has('id_pengguna'))
            $this->response->redirect(base_url() . "/login");
        else {
            $laporan = new MainModel();
            $x = ['page' => "File Manager", "sub_page" => 'Laporan Rusak'];
            echo view('head', ['title' => "File Manager- Condition Monitoring"]);
            echo view('Home/side-bar', $x);
            // BEGIN: content
            echo view('Home/top-bar', $x);
            $id = $_GET['id'];
            $data = $laporan->get_laporanByID($id);
            echo view('FileManager/crud/laporan-form-edit', ['data' => $data]);
            // END: content
        }
    }

    public function laporan_baru()
    {
        if (!$this->session->has('id_pengguna'))
            $this->response->redirect(base_url() . "/login");
        else {
            $x = ['page' => "File Manager", "sub_page" => 'Laporan Rusak'];
            echo view('head', ['title' => "File Manager- Condition Monitoring"]);
            echo view('Home/side-bar', $x);
            // BEGIN: content
            echo view('Home/top-bar', $x);
            echo view('FileManager/crud/laporan-form-baru');
            // END: content
        }
    }

    public function proses_edit_laporan()
    {
        if (isset($_POST['submit'])) {
            $insert = new AdminModel();
            $id_laporan = $_POST['id_laporan'];
            $judul_laporan = $_POST['judul_laporan'];
            $detail_laporan = $_POST['detail_laporan'];
            $status = $insert->update_laporanByID($id_laporan, $judul_laporan, $detail_laporan);
            $this->response->redirect(base_url() . "/file-manager/laporan_rusak?$status");
        }
    }

    public function proses_laporan_baru()
    {
        if (isset($_POST['submit'])) {
            $insert = new UserModel();
            $id_pelapor = $_SESSION['id_pengguna'];
            $judul_laporan = $_POST['judul_laporan'];
            $detail_laporan = $_POST['detail_laporan'];
            $id_kadep = '';
            $status = $insert->create_laporan($id_pelapor, $judul_laporan, $detail_laporan, $id_kadep);
            $this->response->redirect(base_url() . "/file-manager");
        }
    }

    public function proses_delete_laporan()
    {
        if (isset($_POST['delete'])) {
            $id =  $_POST['id'];
            $delete = new AdminModel();
            $delete->delete_laporan($id);
            $this->response->redirect(base_url() . "/file-manager/laporan_rusak");
        }
    }

    public function proses_approval_laporan()
    {
        if (isset($_POST['yes'])) {
            $id =  $_POST['id'];
            $model = new AdminModel();
            echo $id;
            $model->set_approval($id, 1);
            $this->response->redirect(base_url() . "/file-manager/laporan_rusak");
        } elseif (isset($_POST['no'])) {
            $id =  $_POST['id'];
            $model = new AdminModel();
            $model->set_approval($id, 0);
            $this->response->redirect(base_url() . "/file-manager/laporan_rusak");
        }
    }

    public function upload_image_laporan(){
        $insert = new UserModel();
        $id = $_POST['id_laporan'];
        $nama_gambar = $_FILES["file"]["name"];
        echo $nama_gambar;
        $ext = basename($_FILES["file"]["name"]);
        $ext = pathinfo($ext, PATHINFO_EXTENSION);

        if (!empty($_FILES)){
            // $target_dir = "../../images/";
            // // $target_dir = "/";
            // $target_file = $target_dir . basename($_FILES["file"]["tmp_name"]);
            // move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
            $this->request->getFile('file')->move("images/laporan_rusak/$id/", "$nama_gambar", true);
            // $insert->foto_laporan($id, "/images/laporan_rusak/$id.$ext");
        }
        
    }

}