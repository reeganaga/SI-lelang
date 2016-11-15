<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends MY_Controller {

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

	function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		// $this->load->model('Keranjang_model');
		// $this->load->model('Harga_model');
		$this->load->model('Kota_model');
		$this->load->model('User_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Transaksi_Detail_model');
		// $this->load->model('Voucher_model');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$arr_transaksi = $this->Transaksi_model->getTransaksiByIdUser($this->id_user);

		$this->template_front->display(
			array(
				'content'=>'front/history/content',
				'javascript'=>'front/history/custom_js',
				'stylesheet'=>'front/history/custom_css'
			),
			array(
				'arr_transaksi'=>$arr_transaksi,
				'title'=>'History Transaksi'
			)
		);
	}

	public function detail($id_transaksi){
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);

		$cek_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'id_transaksi'=>$id_transaksi,
		));
		// 1 -> gakpake voucher ; 0 pakai voucher
		// dicek tranaksinya mengunakan voucher atau tidak
		if ($cek_transaksi->num_rows()==0) {
			// transaksi pakai voucher
			$arr_transaksi = $this->Transaksi_model->getTransaksiAll($id_transaksi);
			$total = $this->total_with_vou($id_transaksi);
		}else{
			// transaksi tanpa voucher
			$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
			$total = $this->total_no_vou($id_transaksi);
		}
		// echo $cek_transaksi->num_rows();
		$this->template_front->display(
			array(
				'content'=>'front/history/content_detail',
			),
			array(
				'arr_transaksi'=>$arr_transaksi,
				'arr_transaksi_detail'=>$arr_transaksi_detail,
				'title'=>'History Transaksi',
				'total'=>$total,
			)
		);
	}

	public function total_no_vou($id_transaksi){
		$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
		foreach ($arr_transaksi as $transaksi) {
			$ongkir = $transaksi->tarif;
		}
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		$sub_total=0;
		foreach ($arr_transaksi_detail as $transaksi_detail) {
			// menjumlah subtotal yang ada di transaksi detail berdasarkan id transaksi
			$sub_total += $transaksi_detail->sub_total;
		}
		$grand_total = $sub_total+$ongkir;
		return $total = array(
			'sub_total'=>$sub_total,
			'grand_total'=>$grand_total
			);
	}	

	public function total_with_vou($id_transaksi){
		$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
		foreach ($arr_transaksi as $transaksi) {
			$ongkir = $transaksi->tarif;
			$id_voucher = $transaksi->id_voucher;
		}
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		$sub_total=0;
		foreach ($arr_transaksi_detail as $transaksi_detail) {
			// menjumlah subtotal yang ada di transaksi detail berdasarkan id transaksi
			$sub_total += $transaksi_detail->sub_total;
		}
		// mengambil data voucher berdasarkan id
		$query_vou = $this->Voucher_model->cek_voucher(array('id_voucher'=>$id_voucher));
		$arr_vou = $query_vou->row_array();
		$persen_vou = $arr_vou['persen'];
		$potongan = $persen_vou/100*$sub_total;
		$grand_total = $sub_total-$potongan+$ongkir;

		// subtotal setelah mendapat potongan
		$sub_total_after = $sub_total-$potongan;
		// echo $potongan;
		return $total = array(
			'sub_total'=>$sub_total,
			'sub_total_after'=>$sub_total_after,
			'grand_total'=>$grand_total,
			'potongan'=>$potongan
			);
	}
}
