<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    public function hari_indo($tgl)
    {
        $hari = ["Mon" => "Senin", "Tue" => "Selasa", "Wed" => "Rabu", "Thu" => "Kamis", "Fri" => "Jum'at", "Sat" => "Sabtu", "Sun" => "Minggu"];
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "November", "Desember"];

        $tgl_raw = date_create($tgl);
        $tgl_buff = date_format($tgl_raw, "Y-m-d-H-i-s");
        $y = substr($tgl_buff, 0, 4);
        $m = substr($tgl_buff, 5, 2);
        $d = substr($tgl_buff, 8, 2);
        $H = substr($tgl_buff, 11, 2);
        $i = substr($tgl_buff, 14, 2);
        $s = substr($tgl_buff, 17, 2);

        $D = date_format($tgl_raw, "D");
        return ['D' => $hari[$D], 'd' => $d, 'm' => $m, 'M' => $bulan[$m - 1], 'y' => $y, 'H' => $H, 'i' => $i, 's' => $s];
    }

    public function login()
    {
        $session = \Config\Services::session();
        if (isset($_POST['submit'])) {
            $id_pengguna = $_POST['id_pengguna'];
            $kata_sandi = sha1($_POST['kata_sandi']);
            $sql = "SELECT * FROM tb_user WHERE id_pengguna='$id_pengguna'";
            $res = $this->db->query($sql);
            $acc_data = $res->getRow();
            $kata_sandi_valid = $acc_data->kata_sandi;
            if ($kata_sandi == $kata_sandi_valid) {
                $buff = [
                    'id_pengguna' => $id_pengguna,
                    'nama_pengguna' => $acc_data->nama_pengguna,
                    'posisi_pengguna' => $acc_data->posisi_pengguna,
                ];
                $session->set($buff);
            }
        }
    }

    public function get_data($date)
    {

        $sql = "SELECT * FROM tb_monitoring WHERE date LIKE '$date%'";
        if (!($res = $this->db->query($sql)))
            echo "Query failed!";
        return $res;
    }

    public function get_label($date){
        $sql = "SELECT * FROM tb_monitoring WHERE date LIKE '$date%'";
        if (!($res = $this->db->query($sql)))
            echo "Query failed!";
        $label = array('waktu' => ["wib", ""], 'voltage' => ["V", ""], 'current' => ["A", ""], 'power' => ["W", ""]);
        $data = $res->getResultArray();
        foreach($data as $value){
            $time = substr($value['Date'], -8, 5);
            $label['waktu'][1] .= "'$time', ";
            $label['voltage'][1] .= "'" . $value['Voltage'] . "', ";
            $label['current'][1] .= "'" . $value['Current'] . "', ";
            $label['power'][1] .= "'" . $value['Power'] . "', ";
        }
        //menghilangkan koma terakhir
        foreach ($label as $nama => $data) {
            $label[$nama][1] = substr($data[1], 0, -2);
        }

        return $label;
    }

    public function total_kerja($waktu)
    {
        $sql = "SELECT COUNT(Current)*15*60 AS total_sec FROM `tb_monitoring` WHERE Date Like '$waktu%' AND Current != 0";
        $res = $this->db->query($sql);
        $total_raw = $res->getLastRow()->total_sec;
        $total_sec = $total_raw % 60;
        $total_min = (int)($total_raw / 60);
        $total_jam = (int)($total_min / 60);
        $total_min = $total_min % 60;
        $total_work = [$total_jam, $total_min, $total_sec, $total_raw];

        return $total_work;
    }

    public function getStatusMachine(){
        $now = date("Y-m-d H:i:s");
        // $now = "2021-08-06 10:00:00";
        // $sql = "SELECT * FROM tb_monitoring WHERE Date LIKE '$now%'";
        $sql = "SELECT * FROM tb_monitoring WHERE Date > SUBTIME('$now', \"0:15:0.000000\")";
        // $sql = "SELECT * FROM tb_monitoring WHERE Date > SUBTIME(\"2021-08-12 16:20:00\", \"0:15:0.000000\")";
        $res = $this->db->query($sql);
        $res = $res->getLastRow();
        $mesinOn = 0;
        if(isset($res))
            if($res->Current != 0) $mesinOn = 1;
        return $mesinOn;
    }

    public function getTodayWork(){
        $now = date("Y-m-d");
        // $now = "2021-06-11";
        $sql = "SELECT COUNT(Current)*15*60 AS total_sec FROM `tb_monitoring` WHERE Date Like '$now%' AND Current != 0";
        $res = $this->db->query($sql);
        $total_raw = $res->getLastRow()->total_sec;
        $total_sec = $total_raw % 60;
        $total_min = (int)($total_raw / 60);
        $total_jam = (int)($total_min / 60);
        $total_min = $total_min % 60;
        // $total_work = "$total_jam Jam $total_min Min $total_sec Sec";
        $total_work = "$total_jam Jam $total_min Min";
        return $total_work;
    }

    public function getTotalWork($waktu){
        $sql = "SELECT COUNT(Current)*15*60 AS total_sec FROM `tb_monitoring` WHERE Date Like '$waktu%' AND Current != 0";
        $res = $this->db->query($sql);
        $total_raw = $res->getLastRow()->total_sec;
        $total_sec = $total_raw % 60;
        $total_min = (int)($total_raw / 60);
        $total_jam = (int)($total_min / 60);
        $total_min = $total_min % 60;
        $total_work = [$total_jam, $total_min, $total_sec, $total_raw];

        return $total_work;
    }

    public function get_laporan()
    {
        $sql = "SELECT * FROM tb_laporan ORDER BY tgl_buat DESC";
        $res = $this->db->query($sql);
        $data = $res->getResultObject();
        return $data;
    }

    public function get_laporanByID($id)
    {
        $sql = "SELECT * FROM tb_laporan WHERE id_laporan=$id ORDER BY tgl_buat DESC";
        $res = $this->db->query($sql);
        $data = $res->getLastRow();
        return $data;
    }

    public function set_aprroval($id, $status){
        $sql = "UPDATE tb_laporan SET status_persetujuan=$status WHERE id_laporan=$id";
        echo $sql;
        $this->db->query($sql);
    }
}
