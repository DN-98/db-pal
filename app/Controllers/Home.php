<?php

namespace App\Controllers;

use App\Models\MainModel;

class Home extends BaseController
{
	public function index()
	{	$model = new MainModel();
		// $UserModel = new MainModel();
		// $UserModel->login();
		$model->login();

		if (!$this->session->has('id_pengguna')) {
			$this->response->redirect(base_url() . "/login");
		} else {
			/* BEGIN : head and side */
			echo view('head', ['title' => "Dashboard - Condition Monitoring"]);
			echo view('Home/side-bar', ['page' => "Dashboard"]);
			/* END : head and side */

			/* BEGIN : content */
			$today = date("Y-m-d");
			// $today = "2021-09-18";
			$now = date("y-m-d H:i:s");
			// $dummy_date = "2021-06-11";
			// echo view('top-bar');
			echo view('Home/top-bar', ['page' => "Dashboard"]);

			$res = $model->get_data($today);	//volt, current, Power
			$data = $res->getResultArray();
			$content_data['tgl'] = $today;
			$content_data['today_data'] = $data;
			$content_data['label'] = $model->get_label($today);
			// echo print_r($data);
			$content_data['today_work'] = $model->total_kerja($today);
			$content_data['total_work'] = $model->total_kerja("");
			$content_data['hari_indo'] = $model->hari_indo($now);
			if (isset($_GET["date_filter"])) {
				$date_filter = $_GET["date_filter"];
				$content_data['label'] = $model->get_label($date_filter);
			}
			echo view('Home/dashboard', $content_data);
			/* END : content */
		}
	}

	public function login()
	{
		echo view("login");
	}

	public function logout()
	{
		session_unset();
		session_destroy();
		$this->response->redirect(base_url());
	}
	
	public function get_data_today()
	{
		# code...
		$model = new MainModel();
		echo $model->getTodayWork();
		// echo "test";
	}
	
	public function get_data_total()
	{
		# code...
		$model = new MainModel();
		echo $model->total_kerja("")[0];
	}

	public function get_status_machine()
	{
		# code...
		$model = new MainModel();
		echo $model->getStatusMachine();
	}

	public function test_ajax()
	{
		echo view("test-ajax");
	}
}
