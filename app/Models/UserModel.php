<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function create_laporan($id_pelapor, $judul_laporan, $detail_laporan, $id_kadep){
        // $id_pelapor = "";
        // $judul_laporan = "";
        // $detail_laporan = "";
        // $id_kadep = "";

        $sql = "INSERT INTO tb_laporan(`id_pelapor`, `judul_laporan`, `detail_laporan`, `id_kadep`) 
        VALUES('$id_pelapor', '$judul_laporan', '$detail_laporan', '$id_kadep')";
        $this->db->query($sql);
       
    }

    public function create_gambar_laporan($id_laporan, $list_gambar){
        // foreach ($list_gambar as $gambar)
        //     $lokasi_gambar .= $gambar;
        // $sql = "INSERT INTO tb_gambar_laporan(`lokasi_gambar`,`id_laporan`)
        // VALUES('')";
        // echo $sql;
    }
}


    // public function hari_indo($tgl)
    // {
    //     $hari = ["Mon" => "Senin", "Tue" => "Selasa", "Wed" => "Rabu", "Thu" => "Kamis", "Fri" => "Jum'at", "Sat" => "Sabtu", "Sun" => "Minggu"];
    //     $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "November", "Desember"];
    //     // $h = (int)(date($tgl, "d"));
    //     $tgl_raw = date_create($tgl);
    //     $tgl_buff = date_format($tgl_raw, "Y-m-d-H-i-s");
    //     $y = substr($tgl_buff, 0, 4);
    //     $m = substr($tgl_buff, 5, 2);
    //     $d = substr($tgl_buff, 8, 2);
    //     $H = substr($tgl_buff, 11, 2);
    //     $i = substr($tgl_buff, 14, 2);
    //     $s = substr($tgl_buff, 17, 2);
    //     // echo "$tgl_buff | | $y | $m | $d | $H | $i | $s";
    //     $D = date_format($tgl_raw, "D");
    //     return ['D' => $hari[$D], 'd' => $d, 'm' => $m, 'M' => $bulan[$m - 1], 'y' => $y, 'H' => $H, 'i' => $i, 's' => $s];
    // }

    // public function login()
    // {
    //     $session = \Config\Services::session();
    //     if (isset($_POST['submit'])) {
    //         $user_id = $_POST['user_id'];
    //         $password = sha1($_POST['pass']);
    //         $sql = "SELECT * FROM tb_user WHERE user_id='$user_id'";
    //         $res = $this->db->query($sql);
    //         $acc_data = $res->getRow();
    //         $password_val = $acc_data->password;
    //         if ($password == $password_val) {
    //             $buff = [
    //                 'user_id' => $user_id,
    //                 'user_name' => $acc_data->user_name,
    //                 'user_position' => $acc_data->user_position,
    //             ];
    //             $session->set($buff);

    //             // $_SESSION['user_id'] = $user_id;
    //             // $_SESSION['user_name'] = $acc_data->user_name;
    //             // $_SESSION['user_position'] = $acc_data->user_position;
    //         }
    //     }
    // }

    // public function get_data($date)
    // {

    //     $sql = "SELECT * FROM tb_monitoring WHERE date LIKE '$date%'";
    //     if (!($res = $this->db->query($sql)))
    //         echo "Query failed!";
    //     $today_data = $res->getResultArray();
    //     $today_current = [];
    //     $today_voltage = [];
    //     $today_power = [];
    //     $label = array('waktu' => ["wib", ""], 'voltage' => ["V", ""], 'current' => ["A", ""], 'power' => ["W", ""]);

    //     foreach ($today_data as $row) {
    //         $time = substr($row['Date'], -8, 5);
    //         $today_voltage[] = ['Time' => $time, 'Voltage' => $row['Voltage']];
    //         $today_current[] = ['Time' => $time, 'Current' => $row['Current']];
    //         $today_power[] = ['Time' => $time, 'Power' => $row['Power']];
    //         $label['waktu'][1] .= "'$time', ";
    //         $label['voltage'][1] .= "'" . $row['Voltage'] . "', ";
    //         $label['current'][1] .= "'" . $row['Current'] . "', ";
    //         $label['power'][1] .= "'" . $row['Power'] . "', ";
    //     }

    //     foreach ($label as $nama => $data) {
    //         // echo print_r($label[$nama]) . "<br>";
    //         $label[$nama][1] = substr($data[1], 0, -2);
    //     }

    //     $recent_data = $res->getLastRow();
    //     // echo "waktu kerja : " . $total_work[0] . "j " . $total_work[1] . "m " . $total_work[2] . "s";

    //     // echo print_r($hb);
    //     $content_data = [
    //         'tgl' => $date,
    //         'recent_data' => $recent_data,
    //         'today_data' => $today_data,
    //         'label' => $label,
    //         'today_voltage' => $today_voltage,
    //     ];

    //     return $content_data;
    // }

    // public function total_kerja($waktu)
    // {
    //     $sql = "SELECT COUNT(Current)*15*60 AS total_sec FROM `tb_monitoring` WHERE Date Like '$waktu%' AND Current != 0";
    //     $res = $this->db->query($sql);
    //     $total_raw = $res->getLastRow()->total_sec;
    //     $total_sec = $total_raw % 60;
    //     $total_min = (int)($total_raw / 60);
    //     $total_jam = (int)($total_min / 60);
    //     $total_min = $total_min % 60;
    //     $total_work = [$total_jam, $total_min, $total_sec, $total_raw];

    //     return $total_work;
    // }

    // public function get_laporan()
    // {
    //     $sql = "SELECT * FROM tb_laporan ORDER BY tgl_buat DESC";
    //     $res = $this->db->query($sql);
    //     $data = $res->getResultObject();
    //     return $data;
    // }

    // public function get_laporanByID($id)
    // {
    //     $sql = "SELECT * FROM tb_laporan WHERE id_laporan=$id ORDER BY tgl_buat DESC";
    //     $res = $this->db->query($sql);
    //     $data = $res->getLastRow();
    //     return $data;
    // }

    // public function update_laporanByID($id, $judul_laporan, $detail_laporan)
    // {
    //     $sql = "UPDATE tb_laporan SET judul_laporan='$judul_laporan', detail_laporan='$detail_laporan' WHERE id_laporan=$id";
    //     if ($this->db->query($sql))
    //         return "sukses";
    //     else return "gagal";
    // }

    // public function foto_laporan($id, $lokasi)
    // {
    //     $sql = "UPDATE tb_laporan SET lokasi_gambar='$lokasi' WHERE id_laporan=$id";
    //     $res = $this->db->query($sql);
    // }
