<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding extends MY_Controller {

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
        $this->load->model('Barang_model');
        $this->load->model('Bidding_model');
        $this->load->model('Kategori_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
		date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{	
		// $arr_barang = $this->Barang_model->getBarang();
		$arr_bidding = $this->Bidding_model->getBidding();
		foreach ($arr_bidding as $row) {
			$query_bidder = $this->Bidding_model->getAmountBidder($row->id_barang);
			// print_r($query_bidder);
			$jml_bidder[$row->id_bidding] = $query_bidder->jml_bidder;
		}
		$this->template_back->display(
			array(
				'content'=>'back/bidding/content',
				'stylesheet'=>'back/bidding/custom_css',
				'javascript'=>'back/bidding/custom_js'
			),
			array(
				'arr_bidding'=>$arr_bidding,
				'jml_bidder'=>$jml_bidder,
			)
		);	
	}


	public function detail($id_barang){
		$barang = $this->Barang_model->getBarangById($id_barang);
		$arr_kategori = $this->Kategori_model->getKategoriDropdown();
		foreach ($arr_kategori as $dropdown) {
			$options[$dropdown['id_kategori']] = $dropdown['nama_kategori'];
		}
		$arr_bidder = $this->Bidding_model->getBiddingByBarang($id_barang);
		$this->template_back->display(
			array(
				'content'=>'back/bidding/content_detail',
				'javascript'=>'back/bidding/custom_js'
			),
			array(
				'barang'=>$barang,
				'arr_kategori'=>$options,
				'arr_bidder'=>$arr_bidder,
			)
		);

	}

	public function status($id,$status){
		$data = array(
			'status'=>$status,
			);
		if ($status=='closed') {
			//mengubah status barang menjadi closed
			$this->Barang_model->updateBarang($id,$data);
			$arr_bidder = $this->Bidding_model->getBiddingByBarang($id);
			
			$i=1;
			foreach ($arr_bidder as $bidder) {
				$id_bidding= $bidder->id_bidding;
				$by = array(
					'id_bidding'=>$bidder->id_bidding,
					'id_barang'=>$id
				);
				if ($i==1) {
					//mengubah bidder yang menang
					$this->Bidding_model->updateBidding($by,array('status'=>'win'));
					echo "yang menang <pre>";
					print_r($this->db->last_query());
					echo "</pre>";
				}else{
					//mengubah bidder yang kalah
					$this->Bidding_model->updateBidding($by,array('status'=>'lose'));
					echo "yang kalah <pre>";
					print_r($this->db->last_query());
					echo "</pre>";
				}$i++;
			}
			$this->session->set_flashdata('msg_success','Anda telah menyelesaikan bidding ini');

		}else{
			if ($this->Barang_model->updateBarang($id,$data)) {
				$this->session->set_flashdata('msg_error','Data Bidding Gagal diubah');
			}else{
				$this->session->set_flashdata('msg_success','Data Bidding berhasil diubah');
			}
		}
		redirect('admin/bidding');
		
	}


	public function upload($id=null){
		$config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['encrypt_name']        = TRUE;
        $config['max_size']             = 1000;
        $this->load->library('upload', $config);
        
        if ($id==null) {
        	//jika tidak terdapat id atau jika posisi tambah
        	if ( ! $this->upload->do_upload('gambar'))
             {
                $this->session->set_flashdata('msg_error',$this->upload->display_errors().$config['upload_path']);
				redirect('admin/katalog_barang/tambah');
             }
        }else{
        	//jika terdapat id atau posisji edit
			// $arr_hto = $this->Barang_model->getBarang();
			//jika data isi
			if ($this->upload->do_upload('gambar')) {
            	unlink($config['upload_path'].$this->input->post('gambar_temp'));
			}else{
                $this->session->set_flashdata('msg_error',$this->upload->display_errors());
				redirect('admin/katalog_barang/detail/'.$id);
			}
        }
	}	
}
