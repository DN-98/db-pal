<?php

namespace App\Models;

use CodeIgniter\Model;

class KadepModel extends Model
{
    public function set_aprroval($id, $status){
        $sql = "UPDATE tb_laporan SET status_persetujuan=$status WHERE id_laporan=$id";
        $this->db->query($sql);
    }

}

?>