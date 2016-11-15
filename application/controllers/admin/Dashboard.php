<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Dashboard extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	var $id_user;
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Transaksi_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{
		$widget = array(
			'transaksi_today'=>$this->transaksi_today(),
			'jml_pelanggan'=>$this->jml_pelanggan(),
			'transaksi_per_month'=>$this->transkasi_per_month(),
			'total_konfirmasi'=>$this->total_konfirmasi(),
			'arr_grafik_month'=>$this->grafik_month()
		);
	 	$arr_grafik_month= $this->grafik_month();
		// $lastday = date('t');
		// $isi=0;
		// for ($i=0; $i <= $lastday; $i++) { 

		// 	foreach ($arr_grafik_month as $grafik) {
		// 		if ($grafik->day == $i) {
		// 			echo "[".$i.",".$grafik->total_bayar."],";
		// 			$isi =1;
		// 		}
		// 	}
		// 	if ($isi==0) {
		// 		echo "[".$i.",0],";	
		// 	}else{
		// 		$isi=0;
		// 	}
		// }
// print_r($arr_grafik_month[0]);
		
		$this->template_back->display(
			array(
				'content'=>'back/dashboard/content',
				'javascript'=>'back/dashboard/custom_js'
			),
			array(
				'widget'=>$widget
			)
		);	
	}

	public function transaksi_today(){
		$month = date('m');
		$date = date('d');
		$year = date('Y');
		$arr_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'MONTH(tgl_pesan)'=>$month,
			'DAY(tgl_pesan)'=>$date,
			'YEAR(tgl_pesan)'=>$year,
		));
		if ($arr_transaksi->num_rows()==0) {
			//tidak ada transaksi hari ini
			$transaksi = 0;
		}else{
			$transaksi = $arr_transaksi->num_rows();
		}
		return $transaksi;
	}

	public function jml_pelanggan(){
		$arr_user = $this->User_model->cek_user(array(
			'level!='=>'admin'
		));
		return $arr_user->num_rows();
	}

	public function transkasi_per_month(){
		$month = date('m');
		$sum_per_month = $this->Transaksi_model->getSumPerMonth($month);
		$transaksi_per_month = $sum_per_month->total_bayar;
		return $transaksi_per_month; 
	}

	public function total_konfirmasi(){
		$total_konfirmasi = $this->Transaksi_model->cek_transaksi(array(
			'status'=>'terkonfirmasi'
		));
		$jml = $total_konfirmasi->num_rows();
		return $jml;
	}
	
	public function grafik_month(){
		$last_day = date('t');
		// echo $last_day;
		$month = date('m');
		$arr_transaksi = $this->Transaksi_model->getGrafikMonth($month);
		// print_r($arr_transaksi);
		return $arr_transaksi;
	}
}
