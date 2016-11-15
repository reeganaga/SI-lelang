<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keranjang extends MY_Controller {

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
		$this->load->model('Barang_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Transaksi_Detail_model');
		// $this->load->model('Voucher_model');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$arr_kota = $this->Kota_model->getKota();
		$arr_user = $this->User_model->getUserById($this->id_user);		
		foreach ($arr_user as $user) {
			$alamat_user = $user->alamat;
		}
		$this->template_front->display(
			array(
				'content'=>'front/keranjang/content',
				'javascript'=>'front/keranjang/custom_js',
				'stylesheet'=>'front/keranjang/custom_css'
			),
			array(
				'arr_kota'=>$arr_kota,
				'alamat_user'=>$alamat_user,
				'title'=>'Keranjang'
			)
		);
	}

	public function hapus($id_keranjang){
		$arr_keranjang = $this->Keranjang_model->getKeranjangById($id_keranjang);
		foreach ($arr_keranjang as $keranjang) {
			$gambar = $keranjang->gambar;
		}
		$location="./assets/uploads/orders/".$gambar;
		unlink($location);
		$this->Keranjang_model->deleteKeranjang($id_keranjang);

		$this->session->set_flashdata('msg_success','Data Berhasil dihapus');
		redirect('member/keranjang');
	}

	public function detail($id_keranjang){
		$arr_keranjang = $this->Keranjang_model->getKeranjangById($id_keranjang);

		$this->template_front->display(
			array(
				'content'=>'front/keranjang/content-detail',
			),
			array(
				'arr_keranjang'=>$arr_keranjang,
				'title'=>'Keranjang'

			)
		);
	}

	public function proses_pesan(){
		// konfigurasi file validasion untuk proses pesan
		$config = array(
		        array(
		                'field' => 'id_kota',
		                'label' => 'Kota',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'pil_alamat',
		        		'label'=>'jenis Alamat',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'alamat',
		        		'label'=>'Kolom Alamat',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'tranfer_ke',
		        		'label'=>'Pilihan Tranfer',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'kode_pos',
		        		'label'=>'Kode Pos',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        )
		);
		$this->form_validation->set_rules($config);
		// exception untuk mengecek apakah formnya sudah valid
		if ($this->form_validation->run() == FALSE) {

			$this->index();
		}else{
			// jika form sudah valid

			// proses insert transaksi dan mengembalikan id_transaksi
			$insert_id= $this->insert_transaksi();
			// insert transaksi detail setelah mendapat id transaksi terakhir
			$this->insert_transaksi_detail($insert_id);
			
			// memberikan pesan sukses
			$this->session->set_flashdata('msg_success','Pemesanan berhasil dilakukan');
			// redirect('member/keranjang/berhasil_pesan');
			$this->berhasil_pesan($insert_id);
			
		}
	}

	public function berhasil_pesan($id_transaksi){

		//mengecek transaksi apakah ada atau tidak
		$cek_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'id_transaksi'=>$id_transaksi,
		)); 
		if ($cek_transaksi->num_rows() !==0) {
			//terdapat transaksi sesuai id transaksi

			//mengecek transaksi
			$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
			$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_detailByTran($id_transaksi);
			$total = $this->total_no_vou($id_transaksi);

				$this->template_front->display(
					array(
						'content'=>'front/keranjang/berhasil_pesan',
						'stylesheet'=>'front/keranjang/custom_css'
					),
					array(
						'arr_transaksi_detail'=>$arr_transaksi_detail,
						'arr_transaksi'=>$arr_transaksi,
						'total'=>$total,
						'title'=>'Keranjang'

					)
				);			
		}else{
			//tidak terdapat transaksi sesuai id transaksi
			$this->index();
		}			
	}


	public function insert_transaksi(){
		
		// print_r($this->cart->contents());
		// exit();
		//mengambil data ongkir
		$arr_ongkir = $this->Kota_model->getKotaById($this->input->post('id_kota'));
		foreach ($arr_ongkir as $ongkir) {
			$tarif_ongkir = $ongkir->tarif;
		}
		// echo $tarif_ongkir;
		$total_bayar=0;
		foreach ($this->cart->contents() as $cart) {
			$total_bayar=$total_bayar+$cart['subtotal'];
		}
		// $total_bayar=($harga*$jml_keranjang);
		// $this->insert_transaksi_detail();
		
		$data_transaksi=array(
					'tgl_pesan'=>date("Y-m-d H:i:s"),
					'status'=>'pending',
					'total_bayar'=>$total_bayar,
					'tranfer_ke'=>$this->input->post('tranfer_ke'),
					'alamat_kirim'=>$this->input->post('alamat'),
					'id_user'=>$this->id_user,
					'kode_pos'=>$this->input->post('kode_pos'),
					'id_kota'=>$this->input->post('id_kota'),
					);
		$insert_id = $this->Transaksi_model->insertTransaksi($data_transaksi);
		return $insert_id;
	}


	public function insert_transaksi_detail($id_transaksi){
		// $arr_keranjang =$this->Keranjang_model->getKeranjangByIdUser($this->id_user);

		foreach ($this->cart->contents() as $cart) {
			$data=array(
				'id_barang'=>$cart['id'],
				'jumlah'=>$cart['qty'],
				'harga'=>$cart['price'],
				'sub_total'=>$cart['subtotal'],
				'id_transaksi'=>$id_transaksi
				);
			$barang = $this->Barang_model->getBarangById($cart['id']);
			$kurangibarang= $barang->jumlah_barang - $cart['qty'];
			$databarang = array(
				'jumlah_barang'=>$kurangibarang,
				);
			//insert ke tabel transaksi detail
			$this->Transaksi_Detail_model->insertTransaksi_Detail($data);
			$this->Barang_model->updateBarang($cart['id'],$databarang);
		}
		// mengkosongkan data keranjang berdasarkan id user
		$this->cart->destroy();
	}

	public function total_no_vou($id_transaksi){
		$arr_transaksi = $this->Transaksi_model->getTransaksiAll($id_transaksi);
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
