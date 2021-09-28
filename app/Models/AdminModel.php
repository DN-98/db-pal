<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function read_laporan(){
        $sql = "SELECT * tb_laporan";
    }

    public function update_laporanByID($id, $judul_laporan, $detail_laporan)
    {
        $sql = "UPDATE tb_laporan SET judul_laporan='$judul_laporan', detail_laporan='$detail_laporan' WHERE id_laporan=$id";
        if ($this->db->query($sql))
            return "sukses";
        else return "gagal";
    }

    public function foto_laporan($id, $lokasi)
    {
        $sql = "UPDATE tb_laporan SET lokasi_gambar='$lokasi' WHERE id_laporan=$id";
        $this->db->query($sql);
    }

    public function set_approval($id, $status){
        $sql = "UPDATE tb_laporan SET status_persetujuan=$status WHERE id_laporan=$id";
        $this->db->query($sql);
    }

    public function delete_laporan($id)
    {
        $sql = "DELETE FROM tb_laporan WHERE id_laporan=$id";
        $this->db->query($sql);
    }
}

?>