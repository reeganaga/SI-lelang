<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfirmasi extends MY_Controller {

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
		$this->load->model('Konfirmasi_model');
        $this->has_permission('member');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$query_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'id_user'=>$this->id_user,
			'status'=>'pending'
		));
		$arr_transaksi = $query_transaksi->result();


		$this->template_front->display(
			array(
				'content'=>'front/konfirmasi/content'
			),
			array(
				'arr_transaksi'=>$arr_transaksi,
				'title'=>'Konfirmasi'
			)
		);
	}

	public function proses_konfirmasi(){
		// konfigurasi file validasion untuk proses pesan

		// konfigurasi validasi gambar
		if (empty($_FILES['gambar']['name']))
		{
		    $this->form_validation->set_rules('gambar', 'Bukti Pengiriman', 'required', array('required' => '%s Perlu diisi'));
		}
		$config = array(
		        array(
		                'field' => 'id_transaksi',
		                'label' => 'Kode Pemesanan',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'jumlah',
		        		'label'=>'Jumlah',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'tgl',
		        		'label'=>'Tanggal',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'jam',
		        		'label'=>'Jam',
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
		        		'field'=>'metode',
		        		'label'=>'Metode Pembayaran',
		        		'rules'=>'required',
		        		'errors'=> array(
		        				'required' => ' %s Perlu diisi.')
		        )
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			//konfigutasi file upload
			$config['upload_path']          = './assets/uploads/konfirmasi/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['encrypt_name']        = TRUE;
	        $config['max_size']             = 500;
			$this->load->library('upload', $config);

			$lokasi_upload=$config['upload_path'];
			
				// proses upload 
			if ($this->upload->do_upload('gambar')) {
				$gambar=$this->upload->data('file_name');
				$id_transaksi=$this->input->post('id_transaksi');
				$data = array(
					'id_transaksi'=>$id_transaksi,
					'jml'=>$this->input->post('jumlah'),
					'tgl'=>$this->input->post('tgl'),
					'jam'=>$this->input->post('jam'),
					'tranfer_ke'=>$this->input->post('tranfer_ke'),
					'metode'=>$this->input->post('metode'),
					'bukti'=>$gambar,
					'catatan'=>$this->input->post('catatan'),
				);
				//insert ke tabel konfirmasi
				$this->Konfirmasi_model->insertKonfirmasi($data);
				// update status  transaksi berdasarkan id transaksi
				$this->Transaksi_model->updateTransaksi($id_transaksi,array('status'=>'terkonfirmasi'));
				//set pesan sukses
				$this->session->set_flashdata('msg_success','Konfirmasi Berhasil dilakukan, anda akan dihubungi jika telah diproses');
				redirect('member/history');
			}else{
				// jika tidak diupload maka muncul pesan error
				$this->session->set_flashdata('msg_error_upload',$this->upload->display_errors());
				$this->index();
			}

		}
	}
}
