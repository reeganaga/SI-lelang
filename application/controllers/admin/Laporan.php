<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

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
        $this->load->model('Transaksi_model');
        $this->load->model('Transaksi_Detail_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$this->template_back->display(
			array(
				'content'=>'back/laporan/content',
				'javascript'=>'back/laporan/custom_js'
			)
		);	
	}

	public function view(){
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');
		$data = array(
			'MONTH(tgl_pesan)'=>$bulan,
			'YEAR(tgl_pesan)'=>$tahun
		);
		$cek_data = $this->Transaksi_model->cek_transaksi($data);
		if ($cek_data->num_rows()==0) {
			// echo "data kosong";
			$this->session->set_flashdata('msg_error','Tidak terdapat data transaksi pada bulan'.$bulan.' dan tahun '.$tahun);
			redirect('admin/laporan');
		}else{
			// jika datanya isi
			$arr_laporan = $this->Transaksi_model->getTransaksiForLaporan($bulan,$tahun);
			$total=0;
			$jml_merch=array();
			$i=1;
			foreach ($arr_laporan as $laporan) {

				$total = $total+$laporan->total_bayar;
				
				$query_jml=$this->Transaksi_Detail_model->cek_transaksi_detail(array(
					'id_transaksi'=>$laporan->id_transaksi
				));
				$jml_merch[$i]=$query_jml->num_rows();
				$i++;
			}

			$this->template_back->display(
				array(
					'content'=>'back/laporan/content',
					'javascript'=>'back/laporan/custom_js'
				),
				array(
					'arr_laporan'=>$arr_laporan,
					'total'=>$total,
					'jml_merch'=>$jml_merch
				)
			);	
		}
	}



}
